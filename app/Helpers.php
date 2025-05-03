<?php

if (!function_exists('getBootstrapColor')) {
    /**
     * Get the corresponding Bootstrap color hex code based on the selected name.
     *
     * @param string $color
     * @return string
     */
    function getBootstrapColor($color)
    {
        $colors = [
            'primary' => '#007bff',
            'success' => '#28a745',
            'warning' => '#ffc107',
            'danger' => '#dc3545',
            'info' => '#17a2b8',
            'secondary' => '#6c757d',
            'dark' => '#343a40'
        ];

        return $colors[$color] ?? '#000'; // Default to black if color is not found
    }
}
