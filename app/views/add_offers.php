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
                    Статистика по офферам
                </h1>
                <div class="form-block mt-4">
                    <form class="form row need-validation">
                        <div class="col-12 mb-3">
                            <label for="file_loader">Изображение</label>
                            <input type="file" class="form-control" id="file_loader" name="file_loader" aria-label="file example" required>
                            <div class="invalid-tooltip">
                                Пожалуйста, выберите изображение.
                            </div>
                        </div>
                        <div class="col-sm-4 position-relative mb-3">
                            <label for="name_offers" class="form-label">Название</label>
                            <input type="text" class="form-control" id="name_offers" name="name_offers" value="Название" required>
                            <div class="invalid-tooltip">
                                Введите название.
                            </div>
                        </div>
                        <div class="col-sm-4 position-relative mb-3">
                            <label for="rating_offers" class="form-label">Оценка</label>
                            <input type="number" class="form-control" id="rating_offers" name="rating_offers" value="Оценка" required>
                            <div class="invalid-tooltip">
                                Введите число.
                            </div>
                        </div>
                        <div class="col-sm-4 position-relative mb-3">
                            <label for="sum" class="form-label">Сумма</label>
                            <input type="number" class="form-control" id="sum" name="sum" value="Сумма" required>
                            <div class="invalid-tooltip">
                                Введите число.
                            </div>
                        </div>
                        <div class="col-12 position-relative mb-3">
                            <label for="basic_url" class="form-label">Ваш URL-адрес</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                                <input type="text" class="form-control" id="basic_url" name="basic_url" aria-describedby="basic-addon3 basic-addon4" required>
                            </div>
                            <div class="form-text" id="basic-addon4">Пример текста справки выходит за пределы группы ввода.</div>
                            <div class="invalid-tooltip">
                                Введите url.
                            </div>
                        </div>
                        <div class="col-12 position-relative mb-3">
                            <label for="special_offer" class="form-label">Специальное предложение</label>
                            <textarea class="form-control" id="special_offer" name="special_offer" placeholder="Введите специальное предложение"></textarea>
                        </div>
                        <div class="col-sm-4 position-relative mb-3">
                            <label for="first_loan" class="form-label">Первый займ</label>
                            <input type="text" class="form-control" id="first_loan" name="first_loan" value="Первый займ" required>
                            <div class="invalid-tooltip">
                                Введите текст.
                            </div>
                        </div>
                        <div class="col-sm-4 position-relative mb-3">
                            <label for="term" class="form-label">Срок</label>
                            <input type="text" class="form-control" id="term" name="term" value="Срок" required>
                            <div class="invalid-tooltip">
                                Введите текст.
                            </div>
                        </div>
                        <div class="col-sm-4 position-relative mb-3">
                            <label for="front_number" class="form-label">Лиц №</label>
                            <input type="number" class="form-control" id="front_number" name="front_number" value="Лиц №" required>
                            <div class="invalid-tooltip">
                                Введите число.
                            </div>
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
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">Vk</td>
                                <td class="text-center">asdfsf.img</td>
                                <td class="text-center">https://asdasdas.ru</td>
                                <td class="text-center">4.7</td>
                                <td class="text-center">1000000</td>
                                <td class="text-center">Бесплатно</td>
                                <td class="text-center">30 дней</td>
                                <td class="text-center">54654564654654</td>
                                <td class="text-center">Удалить</td>
                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">Vk</td>
                                <td class="text-center">asdfsf.img</td>
                                <td class="text-center">https://asdasdas.ru</td>
                                <td class="text-center">4.7</td>
                                <td class="text-center">1000000</td>
                                <td class="text-center">Бесплатно</td>
                                <td class="text-center">30 дней</td>
                                <td class="text-center">54654564654654</td>
                                <td class="text-center">Удалить</td>
                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">Vk</td>
                                <td class="text-center">asdfsf.img</td>
                                <td class="text-center">https://asdasdas.ru</td>
                                <td class="text-center">4.7</td>
                                <td class="text-center">1000000</td>
                                <td class="text-center">Бесплатно</td>
                                <td class="text-center">30 дней</td>
                                <td class="text-center">54654564654654</td>
                                <td class="text-center">Удалить</td>
                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">Vk</td>
                                <td class="text-center">asdfsf.img</td>
                                <td class="text-center">https://asdasdas.ru</td>
                                <td class="text-center">4.7</td>
                                <td class="text-center">1000000</td>
                                <td class="text-center">Бесплатно</td>
                                <td class="text-center">30 дней</td>
                                <td class="text-center">54654564654654</td>
                                <td class="text-center">Удалить</td>
                            </tr>
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