<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Firestore;
use Kreait\Firebase\Storage;

class FirebaseService
{
    protected $firebase;
    protected $auth;
    protected $firestore;
    protected $storage;

    public function __construct()
    {
        $factory = (new Factory)->withServiceAccount(config('firebase.credentials'));

        $this->firebase = $factory;
        $this->auth = $factory->createAuth();
        $this->firestore = $factory->createFirestore();
        $this->storage = $factory->createStorage();
    }

    public function getAuth(): Auth
    {
        return $this->auth;
    }

    public function getFirestore(): Firestore
    {
        return $this->firestore;
    }

    public function getStorage(): Storage
    {
        return $this->storage;
    }
}
