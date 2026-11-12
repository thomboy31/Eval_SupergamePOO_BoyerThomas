<?php

class View
{
    public function displayHeader(): self
    {
        echo '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site</title>
</head>
<body>
    <header>
        <h1>Bienvenue</h1>
    </header>';

return $this;
    }

    public function displayFooter(): self
    {
        echo '<footer>
        
    </footer>
</body>
</html>';
return $this;
    }
}

