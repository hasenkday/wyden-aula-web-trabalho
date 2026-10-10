export function Badge({ label, variant = 'default' }) {
  return `
    <span class="badge badge--${variant}">
      ${label}
    </span>
  `;
}

export function renderBadgeList(targetId, items) {
  const target = document.querySelector(`#${targetId}`);
  target.innerHTML = items.map((item) => Badge({ label: item })).join('');
}
