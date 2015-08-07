<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/contact.php";

    session_start();

    /* If there are no contacts entered we will need an
    empty array to direct our contacts to */

    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));
    /* Route to home page:
        will display all contact information submitted through form fields
        while also allowing users to add additional contacts to be saved*/
    $app->get("/", function() use($app) {
        return $app['twig']->render('contacts.html.twig', array('contacts' => Contact::getAll()));
    });

    /* Route to created contact page:
        appears when new contact has been created & saves contact in ther
        list_of_contacts array */
    $app->post("/contacts", function() use ($app) {
        $contact = new Contact($_POST['name'], $_POST['phonenumber'], $_POST['address'], $_POST['email']);
        $contact->save();
        return $app['twig']->render('create_contact.html.twig', array('newcontact' => $contact));
    });

    /* Route to confirmed delete contact page:
        Deletes all previous contacts entered*/
    $app->post("/delete_contacts", function() use($app) {
        Contact::deleteAll();
        return $app['twig']->render('delete_contacts.html.twig');
    });

    return $app;

?>
