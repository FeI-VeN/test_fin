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
                    Статистика по источникам
                </h1>
                <div class="form-block mt-4">
                    <form class="form row justify-content-center" method="post">
                        <div class="col-6 col-sm-4 mb-3">
                            <label for="date_start" class="form-label">
                                Начало периода
                            </label>
                            <input type="datetime-local" name="date_start" class="form-control" id="date_start" value="<?= htmlspecialchars(old('date_start'), ENT_QUOTES)?>">
                        </div>
                        <div class="col-6 col-sm-4 mb-3">
                            <label for="date_end" class="form-label">
                                Конец периода
                            </label>
                            <input type="datetime-local" name="date_end" class="form-control" id="date_end" value="<?= htmlspecialchars(old('date_end'), ENT_QUOTES)?>">
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
                            <th class="text-center">Название</th>
                            <th class="text-center">Клики</th>
                            <th class="text-center">Уникальные клики</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($sources) && !empty($sources)):?>
                                <?php foreach($sources as $source):?>
                                    <tr>
                                        <td class="text-center"><?= htmlspecialchars($source['source'], ENT_QUOTES)?></td>
                                        <td class="text-center"><?= $source['total_ips']?></td>
                                        <td class="text-center"><?= $source['unique_ips']?></td>
                                    </tr>
                                <?php endforeach;?>
                            <?php else:?>
                                <tr>
                                    <td colspan="3" class="text-center">
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