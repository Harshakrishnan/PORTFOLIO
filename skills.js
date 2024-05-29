document.addEventListener('DOMContentLoaded', function () {
  const progressBars = document.querySelectorAll('.progress-bar');

  progressBars.forEach(function (progressBar) {
    const progress = progressBar.querySelector('.progress');
    const percentage = progress.dataset.percentage;
    setColor(progress, percentage);
  });

  function setColor(element, percentage) {
    let color;
    if (percentage < 50) {
      color = '#ff8080'; // Lighter color for lower percentages
    } else {
      color = '#4CAF50'; // Darker color for higher percentages
    }
    element.style.backgroundColor = color;
  }
});
