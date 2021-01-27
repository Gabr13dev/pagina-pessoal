<style>label {font-size: 22px;}</style>
<div class="site-section">
        <div class="row mb-4">
            <div class="col-md-12 text-center vh-20">
                <label>Escolha a categoria</label>
                <select class="form-control-main" id="category">
                        <option value="">Escolha a categoria</option>
                    <?php foreach($category as $key => $option){ ?>
                        <option value="<?=$option?>"><?=$option?></option>
                    <?php } ?>
                </select>
                <label>Escolha o Perfil</label>
                <select class="form-control-main" id="profile" disabled>
                        <option value="">Nenhuma categoria encontrada</option>
                </select>
                <input id="btnView" class="btn btn-outline-success w-30-btn" value="Visualizar" />
            </div>
        </div>
</div>
<?php include_once("js/home/perfil-js.php");?>