document.addEventListener("DOMContentLoaded", function () {
   setupCharCountLayout();
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
});
const span = label?.querySelector('span');
const wrapper = label?.querySelector('[data-wrapper="pesan-wrapper"]');
const counter = document.getElementById('charCount');
if (!label || !span || !wrapper || !counter) return;
const isMobile = window.matchMedia('(max-width: 600px)').matches;
if (isMobile) 
label.style.display = 'flex';