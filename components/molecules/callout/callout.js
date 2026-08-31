function Callout({
  title = 'Callout title',
  description = 'Write some text here',
  color = 'var(--color-primary-400)',
}) {
  return `
    <div class="flex-col callout" style="border-color: ${color}">
        <h3>${title}</h3>
        <p>${description}</p>
    </div>
  `;
}
