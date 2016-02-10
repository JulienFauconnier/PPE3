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
                    <a href="#panel1">Liste des Tickets</a>
                    <div id="panel1" class="content active">
                        <table class="responsive">
                            <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="15%">Date</th>
                                <th width="20%">Objet</th>
                                <th width="15%">Difficulté</th>
                                <th width="15%">Etat</th>
                                <th width="20%">Technicien</th>
                                <th width="5%">Intervention</th>
                                <th width="5">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($tickets as $ticket) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $ticket['id_ticket'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $ticket['date_ticket'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $ticket['objet_ticket'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $ticket['complexite_ticket'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $ticket['etat_ticket'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $ticket['nom'] . " " . $ticket['prenom'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $ticket['dateint_ticket'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($_SESSION['nm_grp'] == 'Technicien' || ($_SESSION['nm_grp'] != 'Technicien' && ($ticket['etat_ticket'] == 'Ouvert' || $ticket['etat_ticket'] == 'En Attente'))) { ?>
                                            <center>
                                                <i onclick="document.location='index.php?page=tickets&a_recup=<?php echo $ticket['id_ticket']; ?>'"
                                                   class="step fi-page-edit size-24" style="cursor:pointer"></i>
                                            </center>
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
            ?>
            <dd class="accordion-navigation">
                <a href="#panel2"><?php if (isset($_GET['a_recup'])) echo 'Modifier'; else echo 'Ajouter'; ?> un
                    Ticket</a>
                <div id="panel2" class="content <?php if (isset($_GET['a_recup'])) echo 'active'; ?>">
                    <form method="post"
                          action="modele/<?php if (isset($_GET['a_recup'])) echo 'set'; else echo 'add'; ?>_ticket.php"
                          data-abide>
                        <div class="row">
                            <div class="large-12 columns">
                                <label>Objet
                                    <input name="objet_ticket" type="text" required pattern="[a-zA-Z]+"
                                           value="<?php if (isset($_GET['a_recup'])) echo $ticket[0]['objet_ticket']; ?>"
                                           placeholder="<?php if (isset($_GET['a_recup'])) echo $ticket[0]['objet_ticket']; ?>"
                                           required/>
                                </label>
                                <small class="error">Un objet est requis et est composé de caractères alphanumériques.
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="large-12 columns">
                                <label>Difficulté
                                    <select name="complexite_ticket">
                                        <option
                                            value="Normal" <?php if (isset($_GET['a_recup']) && $ticket[0]['complexite_ticket'] == 'Normal') echo "selected"; ?>>
                                            Normal
                                        </option>
                                        <option
                                            value="Important" <?php if (isset($_GET['a_recup']) && $ticket[0]['complexite_ticket'] == 'Important') echo "selected"; ?>>
                                            Important
                                        </option>
                                        <option
                                            value="Urgent" <?php if (isset($_GET['a_recup']) && $ticket[0]['complexite_ticket'] == 'Urgent') echo "selected"; ?>>
                                            Urgent
                                        </option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="large-12 columns">
                                <label>Description
                                    <textarea name="description_ticket"
                                              placeholder="<?php if (isset($_GET['a_recup'])) echo $ticket[0]['description_ticket']; ?>"
                                              required><?php if (isset($_GET['a_recup'])) echo $ticket[0]['description_ticket']; ?></textarea>
                                </label>
                                <small class="error">Une description est requise.</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="large-12 columns">
                                <label>Solution
                                    <textarea name="solution_ticket"
                                              placeholder="<?php if (isset($_GET['a_recup'])) echo $ticket[0]['solution_ticket']; ?>"><?php if (isset($_GET['a_recup'])) echo $ticket[0]['solution_ticket']; ?></textarea>
                                </label>
                            </div>
                        </div>
                        <?php
                        if (isset($_GET['a_recup'])) {
                            ?>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>Etat
                                        <select name="etat_ticket">
                                            <option
                                                value="Ouvert" <?php if (isset($_GET['a_recup']) && $ticket[0]['etat_ticket'] == 'Ouvert') echo "selected"; ?>>
                                                Ouvert
                                            </option>
                                            <option
                                                value="En Attente" <?php if (isset($_GET['a_recup']) && $ticket[0]['etat_ticket'] == 'En Attente') echo "selected"; ?>>
                                                En Attente
                                            </option>
                                            <option
                                                value="Résolu" <?php if (isset($_GET['a_recup']) && $ticket[0]['etat_ticket'] == 'Résolu') echo "selected"; ?>>
                                                Résolu
                                            </option>
                                            <option
                                                value="Fermé" <?php if (isset($_GET['a_recup']) && $ticket[0]['etat_ticket'] == 'Fermé') echo "selected"; ?>>
                                                Fermé
                                            </option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="row">
                            <div class="large-12 columns">
                                <label>Equipement
                                    <select name="idEquipement">
                                        <?php
                                        foreach ($equipements as $equipement) {
                                            ?>
                                            <option
                                                value="<?php echo $equipement['id_equipement']; ?>" <?php if (isset($_GET['a_recup']) && $equipement['id_equipement'] == $ticket[0]['idEquipement']) echo "selected"; ?> ><?php echo $equipement['cpu_equipement'] . ' ' . $equipement['hdd_equipement'] . ' ' . $equipement['soft_equipement'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <?php if (isset($_GET['a_recup'])) { ?>
                            <input hidden name="id_ticket" value="<?php echo $_GET['a_recup']; ?>">
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
        </dl>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
