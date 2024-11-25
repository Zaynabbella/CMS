<?php
/*
Plugin Name: Canvas Countdown Timer
Description: Adds a customizable canvas-based countdown timer to your WordPress site.
Version: 1.0
Author: CSX-26
*/

// Shortcode to render the countdown timer
function canvas_countdown_timer_shortcode()
{
    ob_start(); ?>
    
    <div id="countdown-timer">
        <main class="cd__main">
            <div class="Holder-Container">
                <img src="<?php echo plugins_url('pic.png', __FILE__); ?>" class="img">
            </div>
            <div class="item-time">
                <div class="card">
                    <div class="word">DAY</div>
                    <canvas class="days" width="50" height="50"></canvas>
                </div>
                <div class="card">
                    <div class="word">HOUR</div>
                    <canvas class="hours" width="50" height="50"></canvas>
                </div>
                <div class="card">
                    <div class="word">MIN</div>
                    <canvas class="minutes" width="50" height="50"></canvas>
                </div>
                <div class="card">
                    <div class="word">SEC</div>
                    <canvas class="seconds" width="50" height="50"></canvas>
                </div>
            </div>
            </main>
    <button class="btn-open-popup animate__animated animate__fadeIn" onclick="togglePopup()">
            Inscrivez-vous
        </button>
        <div id="popupOverlay" class="overlay-container">
        <div class="popup-box">
            <div class="form-container">
                <h2 class="animate__animated animate__fadeInDown">Formulaire d'Inscription</h2>
                <form>
                    <!-- Information Personnel -->
                    <div class="form-section animate__animated animate__fadeInUp">
                        <div class="section-title">Information Personnel</div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="cni">CNI</label>
                                <input class="form-input" type="text" id="cni" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="cne">CNE</label>
                                <input class="form-input" type="text" id="cne" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="nom">Nom</label>
                                <input class="form-input" type="text" id="nom" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="prenom">Prénom</label>
                                <input class="form-input" type="text" id="prenom" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="dateNaissance">Date de naissance</label>
                                <input class="form-input" type="date" id="dateNaissance" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="villeNaissance">Ville de naissance</label>
                                <input class="form-input" type="text" id="villeNaissance" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="adresse">Adresse</label>
                                <input class="form-input" type="text" id="adresse" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="telephone">Téléphone</label>
                                <input class="form-input" type="tel" id="telephone" required>
                            </div>
                        </div>
                    </div>

                    <!-- Information de Baccalauréat -->
                    <div class="form-section animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                        <div class="section-title">Information de Baccalauréat</div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="serieBac">Série de BAC</label>
                                <select class="form-select" id="serieBac" required>
                                    <option value="">Sélectionner une série</option>
                                    <option value="PC">Sciences Physiques</option>
                                    <option value="SVT">Sciences de la Vie et de la Terre</option>
                                    <option value="SM">Sciences Mathématiques</option>
                                    <option value="STE">Sciences et Technologies Électriques</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="anneeBac">Année de BAC</label>
                                <select class="form-select" id="anneeBac" required>
                                    <option value="">Sélectionner une année</option>
                                    <script>
                                        const currentYear = new Date().getFullYear();
                                        for (let year = currentYear; year >= 2015; year--) {
                                            document.write(`<option value="${year}">${year}</option>`);
                                        }
                                    </script>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="mentionBac">Mention de BAC</label>
                                <select class="form-select" id="mentionBac" required>
                                    <option value="">Sélectionner une mention</option>
                                    <option value="TB">Très Bien</option>
                                    <option value="B">Bien</option>
                                    <option value="AB">Assez Bien</option>
                                    <option value="P">Passable</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="noteBac">Note de BAC</label>
                                <input class="form-input" type="number" id="noteBac" step="0.01" min="0" max="20" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="etablissement">Établissement</label>
                                <input class="form-input" type="text" id="etablissement" required>
                            </div>
                        </div>
                    </div>

                    <!-- Information de BAC +2 -->
                    <div class="form-section animate__animated animate__fadeInUp" style="animation-delay: 0.4s;">
                        <div class="section-title">Information de BAC +2</div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="typeDiplome">Diplôme</label>
                                <select class="form-select" id="typeDiplome" required>
                                    <option value="">Sélectionner un diplôme</option>
                                    <option value="BTS">BTS</option>
                                    <option value="DUT">DUT</option>
                                    <option value="DTS">DTS</option>
                                    <option value="SMI">SMI</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="anneeDiplome">Année de Diplôme</label>
                                <select class="form-select" id="anneeDiplome" required>
                                    <option value="">Sélectionner une année</option>
                                    <script>
                                        for (let year = currentYear; year >= 2015; year--) {
                                            document.write(`<option value="${year}">${year}</option>`);
                                        }
                                    </script>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="mentionDiplome">Mention de Diplôme</label>
                                <select class="form-select" id="mentionDiplome" required>
                                    <option value="">Sélectionner une mention</option>
                                    <option value="TB">Très Bien</option>
                                    <option value="B">Bien</option>
                                    <option value="AB">Assez Bien</option>
                                    <option value="P">Passable</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="noteS1">Note S1</label>
                                <input class="form-input" type="number" id="noteS1" step="0.01" min="0" max="20" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="noteS2">Note S2</label>
                                <input class="form-input" type="number" id="noteS2" step="0.01" min="0" max="20" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="noteS3">Note S3</label>
                                <input class="form-input" type="number" id="noteS3" step="0.01" min="0" max="20" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="noteS4">Note S4</label>
                                <input class="form-input" type="number" id="noteS4" step="0.01" min="0" max="20" required>
                            </div>
                        </div>
                    </div>
    
                    <!-- Documents -->
                    <div class="form-section">
                        <div class="section-title">Documents</div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="cniFile">CNI recto-verso</label>
                                <input class="file-input" type="file" id="cniFile" accept="application/pdf" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="bacFile">BAC recto-verso</label>
                                <input class="file-input" type="file" id="bacFile" accept="application/pdf" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="bacFile">Diplôme recto-verso</label>
                                <input class="file-input" type="file" id="DipFile" accept="application/pdf" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="releveS1">Relevé de note S1</label>
                                <input class="file-input" type="file" id="releveS1" accept="application/pdf" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="releveS2">Relevé de note S2</label>
                                <input class="file-input" type="file" id="releveS2" accept="application/pdf" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="releveS3">Relevé de note S3</label>
                                <input class="file-input" type="file" id="releveS3" accept="application/pdf" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="releveS4">Relevé de note S4</label>
                                <input class="file-input" type="file" id="releveS2" accept="application/pdf" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn-submit">Soumettre</button>
                            <button type="button" class="btn-close-popup" onclick="togglePopup()">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>


            </div>
            </div>

    <?php
    return ob_get_clean();
}
add_shortcode('canvas_countdown', 'canvas_countdown_timer_shortcode');

// Enqueue assets
function canvas_countdown_enqueue_assets()
{
    // Enqueue CSS
    wp_enqueue_style('countdown-timer-css', plugins_url('css/style.css', __FILE__));

    // Enqueue JavaScript and localize data
    wp_enqueue_script('countdown-timer-js', plugins_url('js/countdown.js', __FILE__), ['jquery'], null, true);

    wp_localize_script('countdown-timer-js', 'CountdownTimerData', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('countdown_timer_nonce'),
    ]);
}
add_action('wp_enqueue_scripts', 'canvas_countdown_enqueue_assets');

// Set the countdown target time during plugin activation
register_activation_hook(__FILE__, 'set_countdown_target_time');
function set_countdown_target_time()
{
    // Set the countdown target time (e.g., 24 hours from now)
    $target_time = time() + (24 * 60 * 60);
    update_option('countdown_target_time', $target_time);
}

// AJAX handler to provide remaining time
function get_remaining_time()
{
    // Verify nonce for security
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'countdown_timer_nonce')) {
        wp_send_json_error(['message' => 'Invalid nonce']);
        return;
    }

    // Get the countdown target time from the database
    $target_time = get_option('countdown_target_time');
    $current_time = current_time('timestamp');
    $remaining_time = $target_time - $current_time;

    // Ensure we don't send negative values
    if ($remaining_time < 0) {
        $remaining_time = 0;
    }

    wp_send_json_success(['remaining_time' => $remaining_time]);
}
add_action('wp_ajax_get_remaining_time', 'get_remaining_time');
add_action('wp_ajax_nopriv_get_remaining_time', 'get_remaining_time');




// Add a settings menu for the countdown timer
function canvas_countdown_settings_menu()
{
    add_menu_page(
        'Countdown Timer Settings',
        'Countdown Timer',
        'manage_options',
        'countdown-timer-settings',
        'canvas_countdown_settings_page'
    );
}
add_action('admin_menu', 'canvas_countdown_settings_menu');

// Display the settings page
function canvas_countdown_settings_page()
{
    // Handle form submission
    if (isset($_POST['countdown_target_time']) && check_admin_referer('update_countdown_time', 'countdown_nonce')) {
        $new_target_time = strtotime(sanitize_text_field($_POST['countdown_target_time']));
        if ($new_target_time > time()) {
            update_option('countdown_target_time', $new_target_time);
            echo '<div class="updated"><p>Countdown target time updated successfully.</p></div>';
        } else {
            echo '<div class="error"><p>Please select a future date and time.</p></div>';
        }
    }

    // Get the current target time
    $current_target_time = get_option('countdown_target_time', time() + (24 * 60 * 60)); // Default to 24 hours from now

    ?>
    <div class="wrap">
        <h1>Countdown Timer Settings</h1>
        <form method="post" action="">
            <?php wp_nonce_field('update_countdown_time', 'countdown_nonce'); ?>
            <table class="form-table">
                <tr>
                    <th><label for="countdown_target_time">Target Date and Time:</label></th>
                    <td>
                        <input type="datetime-local" id="countdown_target_time" name="countdown_target_time"
                            value="<?php echo esc_attr(date('Y-m-d\TH:i', $current_target_time)); ?>" required>
                        <p class="description">Set the target date and time for the countdown.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button('Save Changes'); ?>
        </form>
    </div>
    <?php
}


function cct_enqueue_assets() {
    // CSS for animation and form
    wp_enqueue_style('animate-css', plugins_url('animate.min.css', __FILE__));
    wp_enqueue_style('registration-form-style', plugins_url('stylish-registration-form.css', __FILE__));

    // JavaScript for popup functionality
    wp_enqueue_script('registration-popup-js', plugins_url('stylish-registration-form.js', __FILE__), array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'cct_enqueue_assets');

// Create a shortcode for the countdown timer and form
function cct_render_shortcode() {
    ob_start();
    ?>
    <div class="countdown-container">
        <!-- Countdown Timer -->
        <div id="countdown-timer"></div>

        <!-- Button to open popup -->
        <button class="btn-open-popup" onclick="togglePopup()">Register Now</button>

        <!-- Popup Form -->
        <div id="popupOverlay" class="overlay-container">
            <div class="popup-box">
                <?php
                // Include the registration form HTML
                $form_path = plugin_dir_path(__FILE__) . 'stylish-registration-form.html';
                if (file_exists($form_path)) {
                    include $form_path;
                } else {
                    echo '<p>Error: Registration form not found.</p>';
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        // Countdown timer script
        document.addEventListener('DOMContentLoaded', function () {
            const countdownElement = document.getElementById('countdown-timer');
            const targetDate = new Date('2024-12-31T23:59:59'); // Adjust your target date

            function updateCountdown() {
                const now = new Date();
                const difference = targetDate - now;

                if (difference <= 0) {
                    countdownElement.textContent = 'Time is up!';
                    return;
                }

                const days = Math.floor(difference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((difference % (1000 * 60)) / 1000);

                countdownElement.textContent = `${days}d ${hours}h ${minutes}m ${seconds}s`;
            }

            setInterval(updateCountdown, 1000);
        });

        // Popup toggle functionality
        function togglePopup() {
            const popup = document.getElementById('popupOverlay');
            popup.classList.toggle('show');
        }
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('canvas_timer_registration', 'cct_render_shortcode');

##############################################################"

register_activation_hook(__FILE__ , 'create_form_data_table');

function create_form_data_table()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'registration_form_data';
    
    // Check if table exists before creating
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        // Create table
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            cni varchar(255) NOT NULL,
            cne varchar(255) NOT NULL,
            nom varchar(255) NOT NULL,
            prenom varchar(255) NOT NULL,
            date_naissance date NOT NULL,
            ville_naissance varchar(255) NOT NULL,
            adresse varchar(255) NOT NULL,
            telephone varchar(255) NOT NULL,
            serie_bac varchar(255) NOT NULL,
            annee_bac varchar(255) NOT NULL,
            mention_bac varchar(255) NOT NULL,
            note_bac float NOT NULL,
            etablissement varchar(255) NOT NULL,
            type_diplome varchar(255) NOT NULL,
            annee_diplome varchar(255) NOT NULL,
            mention_diplome varchar(255) NOT NULL,
            note_s1 float NOT NULL,
            note_s2 float NOT NULL,
            note_s3 float NOT NULL,
            note_s4 float NOT NULL,
            cni_file varchar(255) NOT NULL,
            bac_file varchar(255) NOT NULL,
            dip_file varchar(255) NOT NULL,
            releve_s1_file varchar(255) NOT NULL,
            releve_s2_file varchar(255) NOT NULL,
            releve_s3_file varchar(255) NOT NULL,
            releve_s4_file varchar(255) NOT NULL,
            UNIQUE KEY id (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}


###################################################"""""

// Enqueue the AJAX script

function enqueue_registration_scripts() {
    wp_enqueue_script('registration-form', plugins_url('js/registration-form.js', dirname(__FILE__)), array('jquery'), '1.0', true);
    
    wp_localize_script('registration-form', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('registration_form_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_registration_scripts');

function create_registration_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'registration_form_data';
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        cni varchar(255) NOT NULL,
        cne varchar(255) NOT NULL,
        nom varchar(255) NOT NULL,
        prenom varchar(255) NOT NULL,
        date_naissance date NOT NULL,
        ville_naissance varchar(255) NOT NULL,
        adresse text NOT NULL,
        telephone varchar(20) NOT NULL,
        serie_bac varchar(50) NOT NULL,
        annee_bac year NOT NULL,
        mention_bac varchar(50) NOT NULL,
        note_bac decimal(4,2) NOT NULL,
        etablissement varchar(255) NOT NULL,
        type_diplome varchar(50) NOT NULL,
        annee_diplome year NOT NULL,
        mention_diplome varchar(50) NOT NULL,
        note_s1 decimal(4,2) NOT NULL,
        note_s2 decimal(4,2) NOT NULL,
        note_s3 decimal(4,2) NOT NULL,
        note_s4 decimal(4,2) NOT NULL,
        cniFile_path varchar(255),
        bacFile_path varchar(255),
        DipFile_path varchar(255),
        releveS1_path varchar(255),
        releveS2_path varchar(255),
        releveS3_path varchar(255),
        releveS4_path varchar(255),
        created_at timestamp DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'create_registration_table');


#########################################################################"


function canvas_countdown_admin_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'registration_form_data';
    $results = $wpdb->get_results("SELECT * FROM $table_name");

    ?>
    <div class="wrap">
        <h1>Registration Form Data</h1>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CNI</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Date de naissance</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row) { ?>
                    <tr>
                        <td><?php echo esc_html($row->id); ?></td>
                        <td><?php echo esc_html($row->cni); ?></td>
                        <td><?php echo esc_html($row->nom); ?></td>
                        <td><?php echo esc_html($row->prenom); ?></td>
                        <td><?php echo esc_html($row->email); ?></td>
                        <td><?php echo esc_html($row->date_naissance); ?></td>
                        <td><a href="#">View</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
}
add_action('admin_menu', function() {
    add_menu_page('Registration Form Data', 'Form Data', 'manage_options', 'form-data', 'canvas_countdown_admin_page');
});
