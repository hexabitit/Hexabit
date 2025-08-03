import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
import { getFirestore } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-firestore.js";

const firebaseConfig = {
  apiKey: "AIzaSyAVnIlmFWj-NMEToWMVl0ezMELDqQpGzOM",
  authDomain: "hexabit-6464d.firebaseapp.com",
  projectId: "hexabit-6464d",
  storageBucket: "hexabit-6464d.firebasestorage.app",
  messagingSenderId: "293920464527",
  appId: "1:293920464527:web:f024f18edbf19e1a629afa",
  measurementId: "G-S1D68KWBQ2"
};

const app = initializeApp(firebaseConfig);
export const db = getFirestore(app);
