<?php

if (!function_exists('current_user')) {
    /**
     * Get the currently authenticated user's data from session.
     *
     * @param  string|null  $key  Optional key to retrieve specific user data
     * @return mixed
     */
    function current_user($key = null)
    {
        if (!session('user_authenticated')) {
            return null;
        }

        if ($key === null) {
            return [
                'id' => session('user_id'),
                'email' => session('user_email'),
                'name' => session('user_name'),
                'token' => session('user_token'),
            ];
        }

        $mapping = [
            'id' => 'user_id',
            'email' => 'user_email',
            'name' => 'user_name',
            'token' => 'user_token',
        ];

        return session($mapping[$key] ?? "user_{$key}");
    }
}

if (!function_exists('is_authenticated')) {
    /**
     * Check if the user is authenticated.
     *
     * @return bool
     */
    function is_authenticated()
    {
        return session('user_authenticated', false);
    }
}

if (!function_exists('user_token')) {
    /**
     * Get the current user's authentication token.
     *
     * @return string|null
     */
    function user_token()
    {
        return session('user_token');
    }
}

if (!function_exists('user_id')) {
    /**
     * Get the current user's ID.
     *
     * @return string|null
     */
    function user_id()
    {
        return session('user_id');
    }
}

if (!function_exists('user_name')) {
    /**
     * Get the current user's name.
     *
     * @return string|null
     */
    function user_name()
    {
        return session('user_name');
    }
}

if (!function_exists('user_email')) {
    /**
     * Get the current user's email.
     *
     * @return string|null
     */
    function user_email()
    {
        return session('user_email');
    }
}
