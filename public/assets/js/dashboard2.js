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
    userModal: 'registerUserBtn',
    testimonyModal: "addTestimonyBtn"
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

  ['messageModal', 'musicModal', 'whatsappModal', 'textModal', 'userModal','imageModal','testimonyModal'].forEach(id => {
    const modal = document.getElementById(id);
    modal?.addEventListener('click', e => {
      if (e.target === modal) closeModal(modal);
    });
  });

  // ----- Optional: Back to Dashboard -----
  document.getElementById("backToDashboard")?.addEventListener("click", () => {
    document.getElementById("dashboard").style.display = "flex";
  });
});
