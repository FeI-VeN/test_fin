<?php
$where = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fillable = ['date_start', 'date_end'];
    $data = load_form($fillable);
    $format = 'Y-m-d H:i';
    $start_str = str_replace('T',' ',  $data['date_start']);
    $end_str = str_replace('T',' ',  $data['date_end']);
    if($data['date_start']){
        $date_start = DateTime::createFromFormat($format, $start_str);
    }

    if($data['date_end']){
        $date_end = DateTime::createFromFormat($format, $end_str);
    }

    if($date_start && $date_end){
        if($date_start <= $date_end){
            $where = " AND `time_click` >= '{$start_str}' AND `time_click` <= '{$end_str}'";
        } else {
            $where = ' AND 1=0';
        }
    } elseif ($date_start){
        $where = " AND `time_click` >= '{$start_str}'";
    } elseif ($date_end){
        $where = " AND `time_click` <= '{$end_str}'";
    }

}

$sources = $db->query("
                    SELECT 
                        source,
                        COUNT(DISTINCT ip_user) AS unique_ips,
                        COUNT(ip_user) AS total_ips 
                    FROM 
                        click_id
                    WHERE 
                        type_el = 'source' {$where}
                    GROUP BY 
                        source
                    ORDER BY source")->findAll();
