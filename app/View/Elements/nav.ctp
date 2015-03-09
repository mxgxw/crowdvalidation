<div class="navbar navbar-default">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo $this->Html->link('Elecciones 2015', '/', array('class' => 'navbar-brand')); ?>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class="<?php if($this->viewVars['page'] == 'acercade') { echo 'active'; } ?>">
                    <?php echo $this->Html->link('Elecciones 2015', '/pages/acercade'); ?>
                </li>
                <li class="<?php if($this->viewVars['page'] == 'agradecimientos') { echo 'active'; } ?>">
                    <?php echo $this->Html->link('Agradecimientos', '/pages/agradecimientos'); ?></li>
                <li class="<?php if($this->viewVars['page'] == 'faq') { echo 'active'; } ?>">
                    <?php echo $this->Html->link('FAQ', '/pages/faq'); ?>
                </li>
                <li class="dropdown <?php if($this->viewVars['page'] == 'alcaldes'||'diputados'||'parlacen') { echo 'active'; } ?>">
                    <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle"
                       data-toggle="dropdown">Resultados <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="<?php if($this->viewVars['page'] == 'alcaldes') { echo 'active'; } ?>">
                            <?php echo $this->Html->link('Alcaldes', '/pages/alcaldes'); ?>
                        </li>
                        <li class="<?php if($this->viewVars['page'] == 'diputados') { echo 'active'; } ?>">
                            <?php echo $this->Html->link('Diputados', '/pages/diputados'); ?>
                        </li>
                        <li class="<?php if($this->viewVars['page'] == 'parlacen') { echo 'active'; } ?>">
                            <?php echo $this->Html->link('Parlacen', '/pages/parlacen'); ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
