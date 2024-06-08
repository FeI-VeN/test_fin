<?php
/**
 * @var Validator $validation
*/
?>
<!DOCTYPE html>
<html lang="ru">
<?php require VIEWS . '/blocks/head.php' ?>
<body class="body_hide">
<div class="wrapper__page wrapper">
    <?php require VIEWS . '/blocks/header.php' ?>
    <main class="wrapper__content">
        <section class="sections-general">
            <div class="container-general">
                <h1 class="txt__level-2">
                    Управление офферами
                </h1>
                <div class="form-block mt-4">
                    <form class="form row need-validation" method="post" enctype="multipart/form-data">
                        <div class="col-12 mb-3 position-relative">
                            <label for="img">Изображение</label>
                            <input type="file" class="form-control" id="img" name="img" aria-label="img">
                            <div class="invalid-tooltip">
                                Пожалуйста, выберите изображение.
                            </div>
                            <?= isset($validation) ? $validation->listErrors('img') : ''?>
                        </div>
                        <div class="col-sm-4 position-relative mb-3">
                            <label for="name_offers" class="form-label">Название</label>
                            <input type="text" class="form-control" id="name_offers" name="name_offers" placeholder="Название" value="<?= htmlspecialchars(old('name_offers'), ENT_QUOTES)?>">
                            <div class="invalid-tooltip">
                                Введите название.
                            </div>
                            <?= isset($validation) ? $validation->listErrors('name_offers') : ''?>
                        </div>
                        <div class="col-sm-4 position-relative mb-3">
                            <label for="rating" class="form-label">Оценка</label>
                            <input type="number" class="form-control" id="rating" min="0" step="0.1" name="rating" placeholder="Оценка" value="<?= old('rating')?>">
                            <div class="invalid-tooltip">
                                Введите число.
                            </div>
                            <?= isset($validation) ? $validation->listErrors('rating') : ''?>
                        </div>
                        <div class="col-sm-4 position-relative mb-3">
                            <label for="sum_offer" class="form-label">Сумма</label>
                            <input type="number" class="form-control" id="sum_offer" name="sum_offer" placeholder="Сумма" value="<?= old('sum_offer')?>">
                            <div class="invalid-tooltip">
                                Введите число.
                            </div>
                            <?= isset($validation) ? $validation->listErrors('sum_offer') : ''?>
                        </div>
                        <div class="col-12 position-relative mb-3">
                            <label for="url_offer" class="form-label">Ваш URL-адрес</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                                <input type="text" class="form-control" id="url_offer" name="url_offer" aria-describedby="basic-addon3 basic-addon4" value="<?= htmlspecialchars(old('url_offer'), ENT_QUOTES)?>">
                            </div>
                            <div class="form-text" id="basic-addon4">Пример текста справки выходит за пределы группы ввода.</div>
                            <div class="invalid-tooltip">
                                Введите url.
                            </div>
                            <?= isset($validation) ? $validation->listErrors('url_offer') : ''?>
                        </div>
                        <div class="col-12 position-relative mb-3">
                            <label for="spec_offer" class="form-label">Специальное предложение</label>
                            <textarea class="form-control" id="spec_offer" name="spec_offer" placeholder="Введите специальное предложение"><?= htmlspecialchars(old('spec_offer'), ENT_QUOTES)?></textarea>
                        </div>
                        <div class="col-sm-4 position-relative mb-3">
                            <label for="loan" class="form-label">Первый займ</label>
                            <input type="text" class="form-control" id="loan" name="loan" placeholder="Первый займ" value="<?= htmlspecialchars(old('loan'), ENT_QUOTES)?>">
                            <div class="invalid-tooltip">
                                Введите текст.
                            </div>
                            <?= isset($validation) ? $validation->listErrors('loan') : ''?>
                        </div>
                        <div class="col-sm-4 position-relative mb-3">
                            <label for="term_offer" class="form-label">Срок</label>
                            <input type="text" class="form-control" id="term_offer" name="term_offer" placeholder="Срок" value="<?= htmlspecialchars(old('term_offer'), ENT_QUOTES)?>">
                            <div class="invalid-tooltip">
                                Введите текст.
                            </div>
                            <?= isset($validation) ? $validation->listErrors('term_offer') : ''?>
                        </div>
                        <div class="col-sm-4 position-relative mb-3">
                            <label for="front_number" class="form-label">Лиц №</label>
                            <input type="number" class="form-control" id="front_number" name="front_number" placeholder="Лиц №" value="<?= old('front_number')?>">
                            <div class="invalid-tooltip">
                                Введите число.
                            </div>
                            <?= isset($validation) ? $validation->listErrors('front_number') : ''?>
                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit">Отправить форму</button>
                        </div>
                    </form>
                </div>
                <div class="table-block mt-3 table-responsive">
                    <table class="table table-striped table-hover table-bordered ">
                        <thead>
                        <tr>
                            <th class="text-center">id</th>
                            <th class="text-center">Название</th>
                            <th class="text-center">Изображение</th>
                            <th class="text-center">Url</th>
                            <th class="text-center">Оценка</th>
                            <th class="text-center">Сумма</th>
                            <th class="text-center">Займ</th>
                            <th class="text-center">Срок</th>
                            <th class="text-center">Лиц №</th>
                            <th class="text-center">Спец.предложение</th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php if(isset($offers)):?>
                                <?php foreach($offers as $offer):?>
                                    <tr>
                                        <td class="text-center"><?= $offer['id']?></td>
                                        <td class="text-center"><?= htmlspecialchars($offer['name'], ENT_QUOTES)?></td>
                                        <td class="text-center"><?= $offer['img']?></td>
                                        <td class="text-center td-url"><?= htmlspecialchars($offer['url_offer'], ENT_QUOTES)?></td>
                                        <td class="text-center"><?= $offer['rating']?></td>
                                        <td class="text-center"><?= $offer['sum_offer']?></td>
                                        <td class="text-center"><?= htmlspecialchars($offer['loan'], ENT_QUOTES)?></td>
                                        <td class="text-center"><?= htmlspecialchars($offer['term_offer'], ENT_QUOTES)?></td>
                                        <td class="text-center"><?= $offer['front_number']?></td>
                                        <td class="text-center"><?= htmlspecialchars($offer['spec_offer'], ENT_QUOTES)?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-danger btn-delete-offer" data-id_offer="<?= $offer['id']?>">
                                                Удалить
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            <?php else:?>
                                <tr>
                                    <td colspan="11" class="text-center">
                                        В данный момент тут ничего нет
                                    </td>
                                </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <?php require VIEWS . '/blocks/footer.php' ?>
</div>
</body>
</html>