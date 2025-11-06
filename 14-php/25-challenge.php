<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora de Edad</title>
  <style>
    /* ====== RESET Y BASE ====== */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', 'Segoe UI', sans-serif;
    }

    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 20px;
    }

    /* ====== CARD PRINCIPAL ====== */
    .calculator-container {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 24px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      padding: 40px 30px;
      width: 100%;
      max-width: 450px;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .calculator-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    /* ====== TÍTULO ====== */
    .calculator-title {
      font-size: 2.2rem;
      font-weight: 700;
      margin-bottom: 30px;
      color: #333;
      position: relative;
    }

    .calculator-title::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background: linear-gradient(90deg, #667eea, #764ba2);
      border-radius: 2px;
    }

    /* ====== FORMULARIO ====== */
    .calculator-form {
      display: flex;
      flex-direction: column;
      gap: 20px;
      margin-bottom: 25px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 8px;
      text-align: left;
    }

    .form-label {
      font-size: 1rem;
      font-weight: 600;
      color: #555;
      padding-left: 5px;
    }

    .form-input {
      padding: 14px 16px;
      border: 2px solid #e1e5ee;
      border-radius: 12px;
      background: #fff;
      color: #333;
      font-size: 1rem;
      transition: all 0.3s ease;
      outline: none;
    }

    .form-input:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .submit-btn {
      padding: 14px 20px;
      background: linear-gradient(90deg, #667eea, #764ba2);
      border: none;
      border-radius: 12px;
      font-weight: 600;
      font-size: 1rem;
      color: white;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 10px;
      letter-spacing: 0.5px;
    }

    .submit-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .submit-btn:active {
      transform: translateY(0);
    }

    /* ====== RESULTADO ====== */
    .result-container {
      background: #f8f9fa;
      border-radius: 16px;
      padding: 25px 20px;
      margin-top: 20px;
      border: 2px dashed #e1e5ee;
      transition: all 0.4s ease;
    }

    .result-text {
      font-size: 1.4rem;
      font-weight: 600;
      color: #333;
      margin: 0;
    }

    .result-age {
      font-size: 2.2rem;
      font-weight: 700;
      color: #667eea;
      margin-top: 8px;
      display: block;
    }

    /* ====== ANIMACIONES ====== */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .fade-in {
      animation: fadeIn 0.5s ease forwards;
    }

    /* ====== RESPONSIVE ====== */
    @media (max-width: 480px) {
      .calculator-container {
        padding: 30px 20px;
      }
      
      .calculator-title {
        font-size: 1.8rem;
      }
      
      .result-text {
        font-size: 1.2rem;
      }
      
      .result-age {
        font-size: 1.8rem;
      }
    }
  </style>
</head>
<body>
  <div class="calculator-container">
    <h1 class="calculator-title">Calculadora de Edad</h1>
    
    <form method="post" class="calculator-form">
      <div class="form-group">
        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-input" required>
      </div>
      <input type="submit" value="Calcular Edad" class="submit-btn">
    </form>

    <?php
      if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $fecha_nacimiento = new DateTime($_POST["fecha_nacimiento"]);
        $hoy = new DateTime();
        $diferencia = $hoy->diff($fecha_nacimiento);
        $años = $diferencia->y;
        echo "<div class='result-container fade-in'>";
        echo "<p class='result-text'>Tu edad es:</p>";
        echo "<span class='result-age'>$años años</span>";
        echo "</div>";
      }
    ?>
  </div>
</body>
</html>