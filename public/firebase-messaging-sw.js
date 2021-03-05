// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.
importScripts('https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.2.9/firebase-messaging.js');

// importScripts('https://www.gstatic.com/firebasejs/8.2.2/firebase-auth.js');
// importScripts('https://www.gstatic.com/firebasejs/8.2.2/firebase-firestore.js');
// Initialize the Firebase app in the service worker by passing in
// your app's Firebase config object.
// https://firebase.google.com/docs/web/setup#config-object
var firebaseConfig = {
  apiKey: "AIzaSyAVg0UjtWhMOKnwbkSCDwhl55T8X3whAnY",
  authDomain: "bot-telegram-ff33e.firebaseapp.com",
  projectId: "bot-telegram-ff33e",
  storageBucket: "bot-telegram-ff33e.appspot.com",
  messagingSenderId: "383270674531",
  appId: "1:383270674531:web:826b3dffb54bf521d41856",
  measurementId: "G-7JDH318GSR"
};
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

// firebase.initializeApp(firebaseConfig);
// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();

messaging.onBackgroundMessage(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  const notificationTitle = 'Background Message Title';
  const notificationOptions = {
    body: 'Background Message body.',
    icon: '/firebase-logo.png'
  };

  self.registration.showNotification(notificationTitle,
    notificationOptions);
});