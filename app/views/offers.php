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
                    <form class="form row justify-content-center ">
                        <div class="col-6 col-sm-4 mb-3">
                            <label for="date_start" class="form-label">
                                Начало периода
                            </label>
                            <input type="date" class="form-control" id="date_start" placeholder="">
                        </div>
                        <div class="col-6 col-sm-4 mb-3">
                            <label for="date_end" class="form-label">
                                Конец периода
                            </label>
                            <input type="date" class="form-control" id="date_end" placeholder="">
                        </div>
                        <div class="col-12 col-sm-3 mb-3 mt-auto mb-auto">
                            <button type="submit" class="btn btn-primary w-100 mt-sm-3">Отправить</button>
                        </div>
                    </form>
                </div>
                <div class="table-block mt-3">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">offers_id</th>
                            <th class="text-center">Название</th>
                            <th class="text-center">Клики</th>
                            <th class="text-center">Уникальные клики</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">Vk</td>
                            <td class="text-center">10</td>
                            <td class="text-center">10</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-center">Vk</td>
                            <td class="text-center">10</td>
                            <td class="text-center">10</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="text-center">Vk</td>
                            <td class="text-center">10</td>
                            <td class="text-center">10</td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td class="text-center">Vk</td>
                            <td class="text-center">10</td>
                            <td class="text-center">10</td>
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