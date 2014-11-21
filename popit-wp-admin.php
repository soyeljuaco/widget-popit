<form method="post" name="elFormulario" action="">
	<?= settings_fields('popit_options'); ?>
	<?php
                $aData = popit_get_persons();
                $aPersons = $aData->result;
            ?>
            <tr>
                <th scope="row">Instancia</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span>Instancia</span></legend>
                        <label for="popit_instance">
                          <input name="popit_instance" type="text" id="popit_instance" value="<?php echo get_option('popit_instance') ?>"> .popit.mysociety.org
                        </label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row">Parlamentarios</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span>Parlamentarios</span></legend>
                        <label for="popit_person_id">
                            <select name="popit_person_id" id="popit_person_id">
                                <option value="0">Seleccione un Parlamentario</option>
                                <?php
                                foreach( $aPersons as $person ) {
                                    $selected = (get_option('popit_person_id') == $person->id) ? 'selected="selected"' : '';
                                ?>
                                <option value="<?=$person->id?>" <?=$selected?>><?=$person->name?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </label>
                    </fieldset>
                </td>
            </tr>


          <?php submit_button(); ?>
        <input type="hidden" name="popit_update" value="true" />
    </form>
