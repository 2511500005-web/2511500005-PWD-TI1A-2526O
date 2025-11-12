document.getElementById("menuToggle").addEventListener("click", function () {
    const nav = document.querySelector("nav");
    nav.classList.toggle("active");
    if (nav.classList.contains("active")) {
        this.textContent = "\u2716";
    } else {
        this.textContent = "\u2630";
    }
});

document.getElementById("txtPesan").addEventListener("input", function () {
    const panjang = this.value.length;
    document.getElementById("charCount").textContent = panjang + "/200 karakter";
});

document.addEventListener("DOMContentLoaded", function () {
    const homeSection = document.getElementById("home");
    const ucapan = document.createElement("p");
    ucapan.textContent = "Halo! Selamat datang di halaman saya!";
    homeSection.appendChild(ucapan);

    function setupCharCountLayout() {
        const label = document.querySelector('label[for="txtPesan"]');
        if (!label) return;
        let wrapper = label.querySelector('[data-wrapper="pesan-wrapper"]');
        const span = label.querySelector('span');
        const textarea = document.getElementById('txtPesan');
        const counter = document.getElementById('charCount');
        if (!span || !textarea || !counter) return;
        if (!wrapper) {
            wrapper = document.createElement('div');
            wrapper.dataset.wrapper = 'pesan-wrapper';
            wrapper.style.width = '100%';
            wrapper.style.flex = '1';
            wrapper.style.display = 'flex';
            wrapper.style.flexDirection = 'column';
            label.insertBefore(wrapper, textarea);
            wrapper.appendChild(textarea);
            wrapper.appendChild(counter);
            textarea.style.width = '100%';
            textarea.style.boxSizing = 'border-box';
            counter.style.color = '#555';
            counter.style.fontSize = '14px';
            counter.style.marginTop = '4px';
        }
        applyResponsiveLayout();
    }

    function applyResponsiveLayout() {
        const label = document.querySelector('label[for="txtPesan"]');
        const span = label?.querySelector('span');
        const wrapper = label?.querySelector('[data-wrapper="pesan-wrapper"]');
        const counter = document.getElementById('charCount');
        if (!label || !span || !wrapper || !counter) return;
        const isMobile = window.matchMedia('(max-width: 600px)').matches;
        if (isMobile) {
            label.style.display = 'flex';
            label.style.flexDirection = 'column';
            label.style.alignItems = 'flex-start';
            label.style.width = '100%';
            span.style.minWidth = 'auto';
            span.style.textAlign = 'left';
            span.style.paddingRight = '0';
            span.style.flexShrink = '0';
            span.style.marginBottom = '4px';
            wrapper.style.flex = '1';
            wrapper.style.display = 'flex';
            wrapper.style.flexDirection = 'column';
            counter.style.alignSelf = 'flex-end';
            counter.style.width = 'auto';
        } else {
            label.style.display = 'flex';
            label.style.flexDirection = 'row';
            label.style.alignItems = 'baseline';
            label.style.width = '100%';
            span.style.minWidth = '180px';
            span.style.textAlign = 'right';
            span.style.paddingRight = '16px';
            span.style.flexShrink = '0';
            span.style.marginBottom = '0';
            wrapper.style.flex = '1';
            wrapper.style.display = 'flex';
            wrapper.style.flexDirection = 'column';
            counter.style.alignSelf = 'flex-end';
            counter.style.width = 'auto';
        }
    }

    setupCharCountLayout();
    window.addEventListener('resize', applyResponsiveLayout);
});

document.querySelector("form").addEventListener("submit", function (e) {
    const nama = document.getElementById("txtNama");
    const email = document.getElementById("txtEmail");
    const pesan = document.getElementById("txtPesan");
    e.preventDefault();
    let isValid = true;

    document.querySelectorAll(".error-msg").forEach(el => el.remove());
    [nama, email, pesan].forEach(el => el.style.border = "");

    if (nama.value.trim().length < 3) {
        showError(nama, "Nama minimal 3 huruf dan tidak boleh kosong.");
        isValid = false;
    } else if (!/^[A-Za-z\s]+$/.test(nama.value)) {
        showError(nama, "Nama hanya boleh berisi huruf dan spasi.");
        isValid = false;
    }
    if (email.value.trim() === "") {
        showError(email, "Email wajib diisi.");
        isValid = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        showError(email, "Format email tidak valid. Contoh: nama@mail.com");
        isValid = false;
    }

    if (pesan.value.trim() === "") {
        showError(pesan, "Pesan wajib diisi.");
        isValid = false;
    } else if (pesan.value.trim().length < 10) {
        showError(pesan, "Pesan minimal 10 karakter agar lebih jelas.");
        isValid = false;
    }

    if (!isValid) {
        e.preventDefault();
    } else {
        alert("Terima kasih, " + nama.value + "!\nPesan Anda telah dikirim.");
        //e.target.reset();
        e.target.submit();
    }
});

function showError(inputElement, message) {
    const label = inputElement.closest("label");
    const container = (label && label.contains(inputElement)) ? label : inputElement.parentNode;
    if (!container) return;
    if (label) label.style.flexWrap = "wrap";
    const small = document.createElement("small");
    small.className = "error-msg";
    small.textContent = message;
    small.style.color = "red";
    small.style.fontSize = "14px";
    small.style.display = "block";
    small.style.marginTop = "4px";
    small.style.flexBasis = "100%";
    small.dataset.forId = inputElement.id;
    const ref = (inputElement.nextSibling && inputElement.nextSibling.parentNode === container) ? inputElement.nextSibling : null;
    container.insertBefore(small, ref);
    inputElement.style.border = "1px solid red";
    alignErrorMessage(small, inputElement);
}

function alignErrorMessage(smallEl, inputEl) {
    const isMobile = window.matchMedia("(max-width: 600px)").matches;
    if (isMobile) {
        smallEl.style.marginLeft = "0";
        smallEl.style.width = "100%";
        return;
    }
    const label = inputEl.closest("label");
    if (!label) return;
    const rectLabel = label.getBoundingClientRect();
    const rectInput = inputEl.getBoundingClientRect();
    const offsetLeft = Math.max(0, Math.round(rectInput.left - rectLabel.left));
    smallEl.style.marginLeft = offsetLeft + "px";
    smallEl.style.width = Math.round(rectInput.width) + "px";
}

window.addEventListener("resize", () => {
    document.querySelectorAll(".error-msg").forEach(small => {
        const target = document.getElementById(small.dataset.forId);
        if (target) alignErrorMessage(small, target);
    });
});