<?php

declare(strict_types=1);

namespace Telnyx\Core;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

/**
 * @phpstan-type SSEvent = array{
 *   event?: string|null, data?: string|null, id?: string|null, retry?: int|null
 * }
 */
final class Util
{
    public const BUF_SIZE = 8192;

    public const JSON_ENCODE_FLAGS = JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;

    public const JSON_CONTENT_TYPE = '/^application\/(?:vnd(?:.[^.]+)*+)?json(?!l)/';

    public const JSONL_CONTENT_TYPE = '/^application\/(:?x-(?:n|l)djson)|(:?(?:x-)?jsonl)/';

    /**
     * @return array<string, mixed>
     */
    public static function get_object_vars(object $object1): array
    {
        return get_object_vars($object1);
    }

    /**
     * @template T
     *
     * @param array<string, T> $array
     * @param array<string, string> $map
     *
     * @return array<string, T>
     */
    public static function array_transform_keys(array $array, array $map): array
    {
        $acc = [];
        foreach ($array as $key => $value) {
            $acc[$map[$key] ?? $key] = $value;
        }

        return $acc;
    }

    /**
     * @param array<string, mixed> $arr
     *
     * @return array<string, mixed>
     */
    public static function array_filter_omit(array $arr): array
    {
        return array_filter($arr, fn ($v, $_) => OMIT !== $v, mode: ARRAY_FILTER_USE_BOTH);
    }

    /**
     * @param string|int|list<string|int>|callable $key
     */
    public static function dig(
        mixed $array,
        string|int|array|callable $key
    ): mixed {
        if (is_callable($key)) {
            return $key($array);
        }

        if (is_array($array)) {
            if ((is_string($key) || is_int($key)) && array_key_exists($key, array: $array)) {
                return $array[$key];
            }

            if (is_array($key) && !empty($key)) {
                if (array_key_exists($fst = $key[0], array: $array)) {
                    return self::dig($array[$fst], key: array_slice($key, 1));
                }
            }
        }

        return null;
    }

    /**
     * @param string|list<string> $path
     */
    public static function parsePath(string|array $path): string
    {
        if (is_string($path)) {
            return $path;
        }

        if (empty($path)) {
            return '';
        }

        [$template] = $path;

        return sprintf($template, ...array_map('rawurlencode', array: array_slice($path, 1)));
    }

    /**
     * @param array<string, mixed> $query
     */
    public static function joinUri(
        UriInterface $base,
        string $path,
        array $query = []
    ): UriInterface {
        $parsed = parse_url($path);
        if ($scheme = $parsed['scheme'] ?? null) {
            $base = $base->withScheme($scheme);
        }
        if ($host = $parsed['host'] ?? null) {
            $base = $base->withHost($host);
        }
        if ($port = $parsed['port'] ?? null) {
            $base = $base->withPort($port);
        }
        if (($user = $parsed['user'] ?? null) || ($pass = $parsed['pass'] ?? null)) {
            $base = $base->withUserInfo($user ?? '', $pass ?? null);
        }
        if ($path = $parsed['path'] ?? null) {
            $base = str_starts_with($path, '/') ? $base->withPath($path) : $base->withPath($base->getPath().'/'.$path);
        }

        [$q1, $q2] = [[], []];
        parse_str($base->getQuery(), $q1);
        parse_str($parsed['query'] ?? '', $q2);

        $merged_query = array_merge_recursive($q1, $q2, $query);
        $qs = http_build_query($merged_query, encoding_type: PHP_QUERY_RFC3986);

        return $base->withQuery($qs);
    }

    /**
     * @param array<string, string|int|list<string|int>|null> $headers
     */
    public static function withSetHeaders(
        RequestInterface $req,
        array $headers
    ): RequestInterface {
        foreach ($headers as $name => $value) {
            if (is_null($value)) {
                $req = $req->withoutHeader($name);
            } else {
                $value = is_int($value)
                            ? (string) $value
                            : (is_array($value)
                            ? array_map(static fn ($v) => (string) $v, array: $value)
                            : $value);
                $req = $req->withHeader($name, $value);
            }
        }

        return $req;
    }

    /**
     * @return \Iterator<string>
     */
    public static function streamIterator(StreamInterface $stream): \Iterator
    {
        if (!$stream->isReadable()) {
            return;
        }

        try {
            while (!$stream->eof()) {
                yield $stream->read(self::BUF_SIZE);
            }
        } finally {
            $stream->close();
        }
    }

    /**
     * @param bool|int|float|string|resource|\Traversable<mixed>|array<string,
     * mixed,>|null $body
     */
    public static function withSetBody(
        StreamFactoryInterface $factory,
        RequestInterface $req,
        mixed $body
    ): RequestInterface {
        if ($body instanceof StreamInterface) {
            return $req->withBody($body);
        }

        $contentType = $req->getHeaderLine('Content-Type');
        if (preg_match(self::JSON_CONTENT_TYPE, $contentType)) {
            if (is_array($body) || is_object($body)) {
                $encoded = json_encode($body, flags: self::JSON_ENCODE_FLAGS);
                $stream = $factory->createStream($encoded);

                return $req->withBody($stream);
            }
        }

        if (preg_match('/^multipart\/form-data/', $contentType)) {
            [$boundary, $gen] = self::encodeMultipartStreaming($body);
            $encoded = implode('', iterator_to_array($gen));
            $stream = $factory->createStream($encoded);

            return $req->withHeader('Content-Type', "{$contentType}; boundary={$boundary}")->withBody($stream);
        }

        if (is_resource($body)) {
            $stream = $factory->createStreamFromResource($body);

            return $req->withBody($stream);
        }

        return $req;
    }

    /**
     * @param \Iterator<string> $stream
     *
     * @return \Iterator<string>
     */
    public static function decodeLines(\Iterator $stream): \Iterator
    {
        $buf = '';
        foreach ($stream as $chunk) {
            $buf .= $chunk;
            while (($pos = strpos($buf, "\n")) !== false) {
                yield substr($buf, 0, $pos);
                $buf = substr($buf, $pos + 1);
            }
        }
        if ('' !== $buf) {
            yield $buf;
        }
    }

    /**
     * @param \Iterator<string> $lines
     *
     * @return \Generator<SSEvent>
     */
    public static function decodeSSE(\Iterator $lines): \Generator
    {
        $blank = ['event' => null, 'data' => null, 'id' => null, 'retry' => null];
        $acc = [];

        foreach ($lines as $line) {
            $line = rtrim($line);
            if ('' === $line) {
                if (empty($acc)) {
                    continue;
                }

                yield [...$blank, ...$acc];
                $acc = [];
            }

            if (str_starts_with($line, ':')) {
                continue;
            }

            $matches = [];
            if (preg_match('/^([^:]+):\s?(.*)$/', $line, $matches)) {
                [, $field, $value] = $matches;

                switch ($field) {
                    case 'event':
                        $acc['event'] = $value;

                        break;

                    case 'data':
                        if (isset($acc['data'])) {
                            $acc['data'] .= "\n".$value;
                        } else {
                            $acc['data'] = $value;
                        }

                        break;

                    case 'id':
                        $acc['id'] = $value;

                        break;

                    case 'retry':
                        $acc['retry'] = (int) $value;

                        break;
                }
            }
        }

        if (!empty($acc)) {
            yield [...$blank, ...$acc];
        }
    }

    public static function decodeJson(string $json): mixed
    {
        return json_decode($json, associative: true, flags: JSON_THROW_ON_ERROR);
    }

    public static function decodeContent(ResponseInterface $rsp): mixed
    {
        if (204 == $rsp->getStatusCode()) {
            return null;
        }

        $content_type = $rsp->getHeaderLine('Content-Type');
        $body = $rsp->getBody();

        if (preg_match(self::JSON_CONTENT_TYPE, subject: $content_type)) {
            $json = $body->getContents();

            return self::decodeJson($json);
        }

        if (preg_match(self::JSONL_CONTENT_TYPE, subject: $content_type)) {
            $it = self::streamIterator($body);
            $lines = self::decodeLines($it);

            return (function () use ($lines) {
                foreach ($lines as $line) {
                    yield static::decodeJson($line);
                }
            })();
        }

        if (str_contains($content_type, needle: 'text/event-stream')) {
            $it = self::streamIterator($body);
            $lines = self::decodeLines($it);

            return self::decodeSSE($lines);
        }

        return self::streamIterator($body);
    }

    public static function prettyEncodeJson(mixed $obj): string
    {
        return json_encode($obj, flags: JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?: '';
    }

    /**
     * @param list<callable> $closing
     *
     * @return \Generator<string>
     */
    private static function writeMultipartContent(
        mixed $val,
        array &$closing,
        ?string $contentType = null
    ): \Generator {
        $contentLine = "Content-Type: %s\r\n\r\n";

        if (is_resource($val)) {
            yield sprintf($contentLine, $contentType ?? 'application/octet-stream');
            while (!feof($val)) {
                if ($read = fread($val, length: self::BUF_SIZE)) {
                    yield $read;
                }
            }
        } elseif (is_string($val) || is_numeric($val) || is_bool($val)) {
            yield sprintf($contentLine, $contentType ?? 'text/plain');

            yield (string) $val;
        } else {
            yield sprintf($contentLine, $contentType ?? 'application/json');

            yield json_encode($val, flags: self::JSON_ENCODE_FLAGS);
        }

        yield "\r\n";
    }

    /**
     * @param list<callable> $closing
     *
     * @return \Generator<string>
     */
    private static function writeMultipartChunk(
        string $boundary,
        ?string $key,
        mixed $val,
        array &$closing
    ): \Generator {
        yield "--{$boundary}\r\n";

        yield 'Content-Disposition: form-data';

        if (!is_null($key)) {
            $name = rawurlencode($key);

            yield "; name=\"{$name}\"";
        }

        yield "\r\n";
        foreach (self::writeMultipartContent($val, closing: $closing) as $chunk) {
            yield $chunk;
        }
    }

    /**
     * @param bool|int|float|string|resource|\Traversable<mixed>|array<string,
     * mixed,>|null $body
     *
     * @return array{string, \Generator<string>}
     */
    private static function encodeMultipartStreaming(mixed $body): array
    {
        $boundary = rtrim(strtr(base64_encode(random_bytes(60)), '+/', '-_'), '=');
        $gen = (function () use ($boundary, $body) {
            $closing = [];

            try {
                if (is_array($body) || is_object($body)) {
                    foreach ((array) $body as $key => $val) {
                        foreach (static::writeMultipartChunk(boundary: $boundary, key: $key, val: $val, closing: $closing) as $chunk) {
                            yield $chunk;
                        }
                    }
                } else {
                    foreach (static::writeMultipartChunk(boundary: $boundary, key: null, val: $body, closing: $closing) as $chunk) {
                        yield $chunk;
                    }
                }

                yield "--{$boundary}--\r\n";
            } finally {
                foreach ($closing as $c) {
                    $c();
                }
            }
        })();

        return [$boundary, $gen];
    }
}
