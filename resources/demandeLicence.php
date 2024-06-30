<div class="container">
    <form action="" method="POST" class="my-3 form d-flex justify-content-center">
        <div class="row">
            <select name="numero_licence" class="form-control h3 text-center">
                <?php for($i=1;$i<=4;$i++) : ?>
                    <option value="<?=$i?>" >Licence <?=$i?></option>
                <?php endfor ?>
                <!-- <option value="2">Licence 2</option>
                <option value="3">Licence 3</option>
                <option value="4">Licence 4</option> -->
            </select>
            <input type="submit" class="btn btn-info btn-info btn-lg" value="Cliquer pour executer 👇🏽👇🏽👇🏽">
        </div>
    </form>
</div>