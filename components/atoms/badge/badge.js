function Badge({ label, variant = 'default' }) {
  return `
    <span class="badge badge--${variant}">
      ${label}
    </span>
  `;
}
