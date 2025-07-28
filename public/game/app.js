const canvas = document.getElementById('pong');
const ctx = canvas.getContext('2d');

// Game settings
const PADDLE_WIDTH = 10;
const PADDLE_HEIGHT = 80;
const BALL_SIZE = 12;
const PLAYER_X = 10;
const AI_X = canvas.width - PADDLE_WIDTH - 10;
const PADDLE_SPEED = 6;
const AI_SPEED = 4;

// Game state
let playerY = (canvas.height - PADDLE_HEIGHT) / 2;
let aiY = (canvas.height - PADDLE_HEIGHT) / 2;
let ballX = canvas.width / 2 - BALL_SIZE / 2;
let ballY = canvas.height / 2 - BALL_SIZE / 2;
let ballSpeedX = 5 * (Math.random() > 0.5 ? 1 : -1);
let ballSpeedY = 4 * (Math.random() * 2 - 1);
let playerScore = 0;
let aiScore = 0;

// Mouse control for player paddle
canvas.addEventListener('mousemove', function(e) {
    const rect = canvas.getBoundingClientRect();
    let mouseY = e.clientY - rect.top;
    playerY = mouseY - PADDLE_HEIGHT / 2;
    // Clamp within canvas
    playerY = Math.max(0, Math.min(canvas.height - PADDLE_HEIGHT, playerY));
});

// Draw everything
function drawRect(x, y, w, h, color) {
    ctx.fillStyle = color;
    ctx.fillRect(x, y, w, h);
}

function drawCircle(x, y, r, color) {
    ctx.fillStyle = color;
    ctx.beginPath();
    ctx.arc(x, y, r, 0, Math.PI * 2, false);
    ctx.closePath();
    ctx.fill();
}

function drawText(text, x, y, color, size = 32) {
    ctx.fillStyle = color;
    ctx.font = `${size}px Arial`;
    ctx.fillText(text, x, y);
}

function resetBall() {
    ballX = canvas.width / 2 - BALL_SIZE / 2;
    ballY = canvas.height / 2 - BALL_SIZE / 2;
    ballSpeedX = 5 * (Math.random() > 0.5 ? 1 : -1);
    ballSpeedY = 4 * (Math.random() * 2 - 1);
}

// AI paddle logic
function moveAI() {
    let centerAI = aiY + PADDLE_HEIGHT / 2;
    if (centerAI < ballY) {
        aiY += AI_SPEED;
    } else if (centerAI > ballY) {
        aiY -= AI_SPEED;
    }
    // Clamp ai paddle inside canvas
    aiY = Math.max(0, Math.min(canvas.height - PADDLE_HEIGHT, aiY));
}

// Collision detection
function collision(px, py, pw, ph, bx, by, bs) {
    return (
        px < bx + bs &&
        px + pw > bx &&
        py < by + bs &&
        py + ph > by
    );
}

// Game update
function update() {
    // Move ball
    ballX += ballSpeedX;
    ballY += ballSpeedY;

    // Ball collision with top/bottom
    if (ballY <= 0 || ballY + BALL_SIZE >= canvas.height) {
        ballSpeedY = -ballSpeedY;
        ballY = Math.max(0, Math.min(canvas.height - BALL_SIZE, ballY));
    }

    // Ball collision with paddles
    // Left paddle (player)
    if (collision(PLAYER_X, playerY, PADDLE_WIDTH, PADDLE_HEIGHT, ballX, ballY, BALL_SIZE)) {
        ballSpeedX = Math.abs(ballSpeedX);
        // Add spin based on where the ball hit the paddle
        let impact = (ballY + BALL_SIZE / 2) - (playerY + PADDLE_HEIGHT / 2);
        ballSpeedY = impact * 0.2;
    }

    // Right paddle (AI)
    if (collision(AI_X, aiY, PADDLE_WIDTH, PADDLE_HEIGHT, ballX, ballY, BALL_SIZE)) {
        ballSpeedX = -Math.abs(ballSpeedX);
        let impact = (ballY + BALL_SIZE / 2) - (aiY + PADDLE_HEIGHT / 2);
        ballSpeedY = impact * 0.2;
    }

    // Score update
    if (ballX < 0) {
        aiScore++;
        resetBall();
    } else if (ballX + BALL_SIZE > canvas.width) {
        playerScore++;
        resetBall();
    }

    // Move AI paddle
    moveAI();
}

// Render game
function render() {
    // Clear canvas
    drawRect(0, 0, canvas.width, canvas.height, "#111");

    // Draw net
    for (let i = 10; i < canvas.height; i += 30) {
        drawRect(canvas.width / 2 - 2, i, 4, 20, "#333");
    }

    // Draw paddles
    drawRect(PLAYER_X, playerY, PADDLE_WIDTH, PADDLE_HEIGHT, "#fff");
    drawRect(AI_X, aiY, PADDLE_WIDTH, PADDLE_HEIGHT, "#fff");

    // Draw ball
    drawRect(ballX, ballY, BALL_SIZE, BALL_SIZE, "#fff");

    // Draw scores
    drawText(playerScore, canvas.width / 4, 50, "#fff");
    drawText(aiScore, 3 * canvas.width / 4, 50, "#fff");
}

// Game loop
function gameLoop() {
    update();
    render();
    requestAnimationFrame(gameLoop);
}

// Start game
gameLoop();