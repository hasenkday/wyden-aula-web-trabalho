function Callout({
  title = 'Callout title',
  description = 'Write some text here',
  color = 'var(--color-primary-400)',
}) {
  return `
    <div class="welcome-card" style="border-color: ${color}">
        <h2>${title}</h2>
        <p>${description}</p>
    </div>
  `;
}
