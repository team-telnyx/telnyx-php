<?php

namespace Telnyx\Core\Implementation;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Telnyx\Core\BaseClient;
use Telnyx\Core\Concerns\ResponseProxy;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type NormalizedRequest from \Telnyx\Core\BaseClient
 *
 * @internal
 *
 * @template R
 *
 * @implements BaseResponse<R>
 */
class RawResponse implements BaseResponse
{
    use ResponseProxy;

    private mixed $decodedBody;

    /** @var R */
    private mixed $coercedResponse;

    private bool $decoded = false;
    private bool $coerced = false;

    /**
     * @param NormalizedRequest $requestInfo
     * @param list<string|int>|string|int|null $unwrap
     */
    public function __construct(
        private BaseClient $client,
        private RequestOptions $options,
        private RequestInterface $request,
        private ResponseInterface $response,
        private array $requestInfo,
        private array|string|int|null $unwrap,
        private Converter|ConverterSource|string $convert,
        private ?string $page,
        private ?string $stream,
    ) {}

    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    public function parse(): mixed
    {
        if (!$this->coerced) {
            if (!is_null($this->stream)) {
                // @phpstan-ignore-next-line assign.propertyType
                $this->coercedResponse = new $this->stream(
                    convert: $this->convert,
                    request: $this->request,
                    response: $this->response,
                    parsedBody: $this->getDecoded(),
                );
            } elseif (!is_null($this->page)) {
                // @phpstan-ignore-next-line assign.propertyType
                $this->coercedResponse = new $this->page(
                    convert: $this->convert,
                    client: $this->client,
                    requestInfo: $this->requestInfo,
                    options: $this->options,
                    response: $this->response,
                    parsedBody: $this->getDecoded(),
                );
            } else {
                // @phpstan-ignore-next-line assign.propertyType
                $this->coercedResponse = Conversion::coerce(
                    $this->convert,
                    value: $this->getDecoded(),
                );
            }

            $this->coerced = true;
        }

        return $this->coercedResponse;
    }

    private function getDecoded(): mixed
    {
        if (!$this->decoded) {
            $decoded = Util::decodeContent($this->response);
            if (!is_null($this->unwrap)) {
                $decoded = Util::dig($decoded, key: $this->unwrap);
            }
            $this->decodedBody = $decoded;
            $this->decoded = true;
        }

        return $this->decodedBody;
    }
}
