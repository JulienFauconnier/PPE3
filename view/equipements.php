<!doctype html>
<html class="no-js" lang="en">
<head>
    <?php include 'header.php'; ?>
</head>
<body>
<?php include 'navigation.php'; ?>

<div class="row">
    <div class="large-12 columns">
        <div class="panel">
            <!-- <h3>We&rsquo;re stoked you want to try Foundation! </h3>
            <p>To get going, this file (index.html) includes some basic styles you can modify, play around with, or totally destroy to get going.</p>
            <p>Once you've exhausted the fun in this document, you should check out:</p> -->
        </div>
    </div>
</div>

<div class="row">
    <div class="small-12 columns">
        <dl class="accordion" data-accordion>
            <?php
            if (!isset($_GET['a_recup'])) {
                ?>
                <dd class="accordion-navigation">
                    <a href="#panel1">Liste des Equipements</a>
                    <div id="panel1" class="content active">
                        <table class="responsive">
                            <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="20%">Processeur</th>
                                <th width="15%">Stockage</th>
                                <th width="25%">Logicels</th>
                                <th width="15%">Date</th>
                                <th width="5%">Garantie</th>
                                <th width="10%">Fournisseur</th>
                                <th width="5%">Possesseur</th>
                                <th width="5%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($equipements as $equipement) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $equipement['id_equipement'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $equipement['cpu_equipement'];
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        echo $equipement['hdd_equipement'];
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        echo $equipement['soft_equipement'];
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        echo $equipement['dateA_equipement'];
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        echo $equipement['garantie_equipement'];
                                        ?> ans
                                    </td>

                                    <td>
                                        <?php
                                        echo $equipement['fourn_equipement'];
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        echo $equipement['nom'] . " " . $equipement['prenom'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($_SESSION['nm_grp'] == 'Technicien') { ?>
                                            <div class="row">
                                                <div class="small-6 columns">
                                                    <i onclick="document.location='index.php?page=equipements&a_recup=<?php echo $equipement['id_equipement']; ?>'"
                                                       class="step fi-page-edit size-24" style="cursor:pointer"></i>
                                                </div>
                                                <div class="small-6 columns">
                                                    <i onclick="if(confirm('Supprimer ?')) document.location='index.php?page=equipements&a_supp=<?php echo $equipement['id_equipement']; ?>'"
                                                       class="step fi-page-delete size-24" style="cursor:pointer"></i>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </dd>
                <?php
            }
            if ($_SESSION['nm_grp'] == 'Technicien' || isset($_GET['a_recup'])) {
                ?>
                <dd class="accordion-navigation">
                    <a href="#panel2"><?php if (isset($_GET['a_recup'])) echo 'Modifier'; else echo 'Ajouter'; ?> un
                        Equipement</a>
                    <div id="panel2" class="content <?php if (isset($_GET['a_recup'])) echo 'active'; ?>">
                        <form method="post"
                              action="modele/<?php if (isset($_GET['a_recup'])) echo 'set'; else echo 'add'; ?>_equipement.php"
                              data-abide>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>Processeur
                                        <input name="cpu_equipement" type="text"
                                               value="<?php if (isset($_GET['a_recup'])) echo $equipement[0]['cpu_equipement']; ?>"
                                               placeholder="<?php if (isset($_GET['a_recup'])) echo $equipement[0]['cpu_equipement']; ?>"
                                               required/>
                                        <small class="error">Le processeur est requis.</small>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>Stockage
                                        <input name="hdd_equipement" type="text"
                                               value="<?php if (isset($_GET['a_recup'])) echo $equipement[0]['hdd_equipement']; ?>"
                                               placeholder="<?php if (isset($_GET['a_recup'])) echo $equipement[0]['hdd_equipement']; ?>"
                                               required/>
                                        <small class="error">Le stockage est requis.</small>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>Logiciels
                                        <textarea name="soft_equipement"
                                                  placeholder="<?php if (isset($_GET['a_recup'])) echo $equipement[0]['soft_equipement']; ?>"
                                                  required><?php if (isset($_GET['a_recup'])) echo $equipement[0]['soft_equipement']; ?></textarea>
                                        <small class="error">La liste des logiciels pré-installés est requise.</small>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>Garantie
                                        <input name="garantie_equipement" type="number"
                                               value="<?php if (isset($_GET['a_recup'])) echo $equipement[0]['garantie_equipement']; ?>"
                                               placeholder="<?php if (isset($_GET['a_recup'])) echo $equipement[0]['garantie_equipement']; ?>"
                                               required/>
                                        <small class="error">La durée de garantie est requise.</small>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>Fournisseur
                                        <input name="fourn_equipement" type="text"
                                               value="<?php if (isset($_GET['a_recup'])) echo $equipement[0]['fourn_equipement']; ?>"
                                               placeholder="<?php if (isset($_GET['a_recup'])) echo $equipement[0]['fourn_equipement']; ?>"
                                               required/>
                                        <small class="error">Le fournisseur est requis.</small>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>Possesseur
                                        <select name="idVisiteur">
                                            <?php
                                            foreach ($membres as $membre) {
                                                ?>
                                                <option
                                                    value="<?php echo $membre['id']; ?>" <?php if (isset($_GET['a_recup']) && $membre['id'] == $equipement[0]['idVisiteur']) echo "selected"; ?> ><?php echo $membre['nom'] . " " . $membre['prenom'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <?php if (isset($_GET['a_recup'])) { ?>
                                <input hidden name="id_equipement" value="<?php echo $_GET['a_recup'] ?>">
                            <?php } ?>
                            <div class="row">
                                <div class="large-6 columns">
                                    <button class="expand radius medium green" type="submit">Envoyer</button>
                                </div>
                                <div class="large-6 columns">
                                    <button class="expand radius medium green" type="reset">Reinitialiser</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </dd>
            <?php } ?>
        </dl>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
