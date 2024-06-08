<?php


class Validator
{
    protected $errors = [];
    protected $rules_list = ['required','min', 'ext', 'size', 'min_resolution', 'max_resolution'];
    protected $messages = [
        'required'           => 'Поле :fieldname: не должно быть пустым',
        'min'                => 'Поле :fieldname: не должно быть меньше 0',
        'ext'                => ':fieldname: допустимый формат файла - :rulevalue:',
        'size'               => ':fieldname: размер файла должен быть не больше :rulevalue: кб',
        'min_resolution'     => ':fieldname: разрешение меньше :rulevalue:',
        'max_resolution'     => ':fieldname: разрешение больше :rulevalue:',
    ];

    public function validate($data = [], $rules = [])
    {
        foreach ($data as $fieldname => $value){
            if(isset($rules[$fieldname])){
                $this->check([
                    'fieldname' => $fieldname,
                    'value'     => $value,
                    'rules'     => $rules[$fieldname],
                ]);
            }
        }
        return $this;
    }

    protected function check ($field) {
        foreach ($field['rules'] as $rule => $rule_value){
            if(in_array($rule, $this->rules_list)){
                if(!call_user_func_array([$this, $rule], [$field['value'], $rule_value])){
                    $this->addError($field['fieldname'], str_replace([':fieldname:', ':rulevalue:'],[$field['fieldname'], $rule_value], $this->messages[$rule]));
                }
            }
        }
    }

    protected function addError($fieldname, $error){
        $this->errors[$fieldname][] = $error;
    }

    public function getErrors(){
        return $this->errors;
    }

    public function hasErrors(){
        return !empty($this->errors);
    }

    public function listErrors($fieldname){
        $output = '';
        if(isset($this->errors[$fieldname])){
            $output .= "<div class='invalid-tooltip d-block'><ul class='list-unstyled'>";
            foreach ($this->errors[$fieldname] as $error){
                $output .= "<li>{$error}</li>";
            }
            $output .= "</ul></div>";
        }
        return $output;
    }
    protected function required ($value, $rule_value) {
        return !empty($value);
    }

    protected function min ($value, $rule_value) {
        return $value >= $rule_value;
    }

    protected function ext ($value, $rule_value) {
        if(empty($value['name'])){
            return true;
        }
        $file_ext = pathinfo($value['name'], 4);
        $allow_ext = explode('|', $rule_value);
        return in_array($file_ext,$allow_ext);
    }

    protected function size ($value, $rule_value) {
        if(empty($value['size'])){
            return true;
        }
        $rule_size = $rule_value * 1024;
        return $value['size'] <= $rule_size;
    }

    protected function min_resolution ($value, $rule_value) {
        if(empty($value['tmp_name'])){
            return true;
        }
        $resolution = getimagesize($value['tmp_name']);
        $rule_resolution = explode('x', $rule_value);
        $width = $resolution[0];
        $height = $resolution[1];
        $rule_w = $rule_resolution[0];
        $rule_h = $rule_resolution[1];
        if ($width < $rule_w || $height < $rule_h) {
            return false;
        } else {
            return true;
        }
    }

    protected function max_resolution ($value, $rule_value) {
        if(empty($value['tmp_name'])){
            return true;
        }
        $resolution = getimagesize($value['tmp_name']);
        $rule_resolution = explode('x', $rule_value);
        $width = $resolution[0];
        $height = $resolution[1];
        $rule_w = $rule_resolution[0];
        $rule_h = $rule_resolution[1];
        if ($width > $rule_w || $height > $rule_h) {
            return false;
        } else {
            return true;
        }
    }
}