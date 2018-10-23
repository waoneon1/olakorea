<?php
// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['shipping']);
    unset($fields['order']['order_comments']);

    $fields['billing']['billing_first_name']['class'][] = 'form-group';
    $fields['billing']['billing_first_name']['input_class'][] = 'form-control';

    $fields['billing']['billing_last_name']['class'][] = 'form-group';
    $fields['billing']['billing_last_name']['input_class'][] = 'form-control';

    $fields['billing']['billing_phone']['class'][] = 'form-group';
    $fields['billing']['billing_phone']['input_class'][] = 'form-control';

    $fields['billing']['billing_email']['class'][] = 'form-group';
    $fields['billing']['billing_email']['input_class'][] = 'form-control';

    /* if (!is_user_logged_in()) {
        $fields['account']    = array(
            'account_username' => array(
                'type' => 'text',
                'label' => __('Account username', 'woocommerce'),
                'placeholder' => _x('Username', 'placeholder', 'woocommerce')
            ),
            'account_password' => array(
                'type' => 'password',
                'label' => __('Account password', 'woocommerce'),
                'placeholder' => _x('Password', 'placeholder', 'woocommerce'),
                'class' => array('form-row-first')
            ),
            'account_password-2' => array(
                'type' => 'password',
                'label' => __('Account password', 'woocommerce'),
                'placeholder' => _x('Password', 'placeholder', 'woocommerce'),
                'class' => array('form-row-last'),
                'label_class' => array('hidden')
            )
        );
    }*/

    return $fields;
}
