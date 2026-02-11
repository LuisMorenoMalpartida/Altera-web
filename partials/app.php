<?php

declare(strict_types=1);

// Base URL path for running under a subfolder (e.g. http://localhost/Altera/)
// or at the web root. We derive it from filesystem paths to avoid guessing
// based on the first URL segment (which breaks for routes like /financiamiento/).
$docRoot = isset($_SERVER['DOCUMENT_ROOT']) ? realpath((string) $_SERVER['DOCUMENT_ROOT']) : false;
$appRoot = realpath(__DIR__ . '/..');

$APP_BASE = '';
if ($docRoot && $appRoot) {
  $docRootNorm = rtrim(str_replace('\\', '/', $docRoot), '/');
  $appRootNorm = rtrim(str_replace('\\', '/', $appRoot), '/');

  if ($docRootNorm !== '' && str_starts_with($appRootNorm . '/', $docRootNorm . '/')) {
    $rel = substr($appRootNorm, strlen($docRootNorm));
    $APP_BASE = $rel === false ? '' : $rel;
  }
}

$APP_BASE = rtrim(str_replace('\\', '/', (string) $APP_BASE), '/');
if ($APP_BASE === '/') {
  $APP_BASE = '';
}

/**
 * Build an absolute URL path scoped to the app base.
 *
 * Examples (APP_BASE='/Altera'):
 * - app_url('') => '/Altera/'
 * - app_url('financiamiento/') => '/Altera/financiamiento/'
 */
function app_url(string $path = ''): string
{
  /** @var string $APP_BASE */
  global $APP_BASE;

  $base = rtrim($APP_BASE, '/');
  $normalized = ltrim($path, '/');

  if ($normalized === '' || $normalized === '/') {
    return $base === '' ? '/' : $base . '/';
  }

  return ($base === '' ? '' : $base) . '/' . $normalized;
}
