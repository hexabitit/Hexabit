import { db } from "./firebase.js";
import {
  collection,
  addDoc,
  serverTimestamp
} from "https://www.gstatic.com/firebasejs/10.7.1/firebase-firestore.js";

document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("contactForm");
  const successMessage = document.getElementById("successMessage");
  const resetButton = document.getElementById("resetForm");

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const service = document.getElementById("service").value;
    const message = document.getElementById("message").value.trim();

    if (!name || !email || !message) return;

    try {
      await addDoc(collection(db, "contactMessages"), {
        name,
        email,
        service,
        message,
        timestamp: serverTimestamp(),
      });

      form.classList.add("hidden");
      successMessage.classList.remove("hidden");

    } catch (error) {
      alert("Failed to send message.");
      console.error(error);
    }
  });

  resetButton?.addEventListener("click", () => {
    form.reset();
    form.classList.remove("hidden");
    successMessage.classList.add("hidden");
  });
});
