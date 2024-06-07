<?php
/**
 * @var Db $db
 */

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = [];
    $fillable = ['name_offers', 'file_loader', 'url_offer', 'rating', 'sum_offer', 'loan', 'term_offer', 'front_number', 'spec_offer'];
    $data = load_form($fillable);
    if (empty(trim($data['name_offers']))){
        $errors['name_offers'] = 'Название оффера пустое';
    }
    if (empty(trim($data['file_loader']))){
        $errors['file_loader'] = 'Название оффера пустое';
    }
    if (empty(trim($data['url_offer']))){
        $errors['url_offer'] = 'Название оффера пустое';
    }
    if (empty(trim($data['rating']))){
        $errors['rating'] = 'Название оффера пустое';
    }
    if (empty(trim($data['sum_offer']))){
        $errors['sum_offer'] = 'Название оффера пустое';
    }
    if (empty(trim($data['loan']))){
        $errors['loan'] = 'Название оффера пустое';
    }
    if (empty(trim($data['term_offer']))){
        $errors['term_offer'] = 'Название оффера пустое';
    }
    if (empty(trim($data['front_number']))){
        $errors['front_number'] = 'Название оффера пустое';
    }
    if (empty(trim($data['spec_offer']))){
        $errors['spec_offer'] = 'Название оффера пустое';
    }
    if(empty($errors)){
        $db->query("INSERT INTO offers (`name`, `img`, `url_offer`, `rating`, `sum_offer`, `loan`, `term_offer`, `front_number`, `spec_offer`) VALUES(:name, :img, :url_offer, :rating, :sum_offer, :loan, :term_offer, front_number, :spec_offer)", [
            'name' => $name,
            'img'  => $img,
            'url_offer' =>$url_offer,
            'rating' => $rating,
            'sum_offer' => $sum_offer,
            'loan' => $loan,
            'term_offer' => $term_offer,
            'front_number' => $front_number,
            'spec_offer' => $spec_offer
        ]);
    }
}

include VIEWS . '/add_offers.php';
