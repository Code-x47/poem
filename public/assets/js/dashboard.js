document.addEventListener("DOMContentLoaded", () => {
  // ----- Modal Handling -----
  const openModal = (modal) => {
    if (modal) {
      modal.style.display = 'flex';
      setTimeout(() => modal.classList.add('show'), 10);
    }
  };

  const closeModal = (modal) => {
    if (modal) {
      modal.classList.remove('show');
      setTimeout(() => modal.style.display = 'none', 300);
    }
  };

  const ids = {
    messageModal: 'addMessageBtn',
    imageModal: 'addImagesBtn',
    musicModal: 'addMusicBtn',
    whatsappModal: 'sendWhatsAppBtn',
    textModal: 'sendTextBtn',
    userModal: 'registerUserBtn'
  };

  for (let modalId in ids) {
    document.getElementById(ids[modalId])?.addEventListener('click', () =>
      openModal(document.getElementById(modalId))
    );
  }

  document.querySelectorAll('.close-modal').forEach(btn => {
    btn.addEventListener('click', (e) => {
      const modalId = e.currentTarget.getAttribute('data-modal');
      closeModal(document.getElementById(modalId));
    });
  });

  ['messageModal', 'musicModal', 'whatsappModal', 'textModal', 'userModal','imageModal'].forEach(id => {
    const modal = document.getElementById(id);
    modal?.addEventListener('click', e => {
      if (e.target === modal) closeModal(modal);
    });
  });

  // ----- Dashboard Toggle (images page) -----
 /* document.getElementById("addImagesBtn")?.addEventListener("click", () => {
    document.getElementById("dashboard").style.display = "none";
    document.getElementById("imagesPage").style.display = "block";
  });*/

  document.getElementById("backToDashboard")?.addEventListener("click", () => {
   // document.getElementById("imagesPage").style.display = "none";
    document.getElementById("dashboard").style.display = "flex";
  });

  // ----- Form Submissions -----
 /* const handleFormSubmit = (formId, message) => {
    const form = document.getElementById(formId);
    form?.addEventListener("submit", (e) => {
      e.preventDefault();
      alert(message);
      form.reset();
      const modal = form.closest('.modal');
      closeModal(modal);
    });
  };

  handleFormSubmit("messageForm", "Message added successfully!");
  handleFormSubmit("musicForm", "Music added successfully!");
  handleFormSubmit("whatsappForm", "WhatsApp message sent!");
  handleFormSubmit("textForm", "Text message sent!");
  handleFormSubmit("userForm", "User registered!");
  //handleFormSubmit("imagesForm", "Images uploaded!");
  handleFormSubmit("imageForm", "Images uploaded!");

  // ----- Sidebar Toggle + Main Content Margin -----
  const sidebarToggle = document.getElementById("sidebarToggle");
  const dashboardContainer = document.getElementById("dashboard");
  const mainContent = document.querySelector(".main-content");

  // optional: mark as mobile for CSS purposes
  dashboardContainer?.classList.add("mobile");

  sidebarToggle?.addEventListener("click", () => {
    dashboardContainer?.classList.toggle("show-sidebar");
    mainContent?.classList.toggle("menu-visible");
  });
  */
});

