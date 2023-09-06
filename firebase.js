// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyAHPO97zd7AATgyKer-YGPxuLAWpAR4VnU",
  authDomain: "ppdms-f63d4.firebaseapp.com",
  projectId: "ppdms-f63d4",
  storageBucket: "ppdms-f63d4.appspot.com",
  messagingSenderId: "363616151249",
  appId: "1:363616151249:web:c683377d2e6320a0c7c7f0",
  measurementId: "G-RYQXT0BZVC"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);