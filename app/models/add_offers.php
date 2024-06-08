<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fillable = ['name_offers', 'img', 'url_offer', 'rating', 'sum_offer', 'loan', 'term_offer', 'front_number', 'spec_offer'];
    $data = load_form($fillable);
    if(isset($_FILES['img']) && $_FILES['img']['error'] === 0){
        $data['img'] = $_FILES['img'];
    } else {
        $data['img'] = [];
    }
    $validator = new Validator();
    $rules = [
        'name_offers' => [
            'required' => true,
        ],
        'rating' => [
            'min' => 0,
        ],
        'sum_offer' => [
            'min' => 0,
        ],
        'img' => [
            'required'       => true,
            'ext'            => 'jpg|png',
            'size'           => 30,
            'min_resolution' => '100x100',
            'max_resolution' => '450x450'
        ]
    ];
    $validation = $validator->validate($data, $rules);
    if(!$validation->hasErrors()){
        if(!empty($data['img']['name'])){
            $dir = '/assets/uploads';
            if(!is_dir(WWW . $dir)){
                mkdir(WWW . $dir, 0755, true);
            }
            $extension = pathinfo($data['img']['name'], 4);
            $file_name = uniqid() .'.'. $extension;
            $file_path = WWW . $dir .'/'. $file_name;
            move_uploaded_file($data['img']['tmp_name'], $file_path);
            $data['img'] = $file_name;
        } else {
            $data['img'] = '';
        }
        $data['rating'] = str_replace(',','.', $data['rating']);
        if($db->query("INSERT INTO offers (`name`, `img`, `url_offer`, `rating`, `sum_offer`, `loan`, `term_offer`, `front_number`, `spec_offer`) VALUES(:name_offers, :img, :url_offer, :rating, :sum_offer, :loan, :term_offer, :front_number, :spec_offer)", $data)){
            redirect();
        }
    }
}

$offers = $db->query("SELECT * FROM offers ORDER BY id DESC")->findAll();
