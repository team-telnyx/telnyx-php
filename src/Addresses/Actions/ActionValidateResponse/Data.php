<?php

declare(strict_types=1);

namespace Telnyx\Addresses\Actions\ActionValidateResponse;

use Telnyx\Addresses\Actions\ActionValidateResponse\Data\Result;
use Telnyx\Addresses\Actions\ActionValidateResponse\Data\Suggested;
use Telnyx\APIError;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   result: value-of<Result>,
 *   suggested: Suggested,
 *   errors?: list<APIError>,
 *   recordType?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Indicates whether an address is valid or invalid.
     *
     * @var value-of<Result> $result
     */
    #[Api(enum: Result::class)]
    public string $result;

    /**
     * Provides normalized address when available.
     */
    #[Api]
    public Suggested $suggested;

    /** @var list<APIError>|null $errors */
    #[Api(list: APIError::class, optional: true)]
    public ?array $errors;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(result: ..., suggested: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withResult(...)->withSuggested(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Result|value-of<Result> $result
     * @param list<APIError> $errors
     */
    public static function with(
        Result|string $result,
        Suggested $suggested,
        ?array $errors = null,
        ?string $recordType = null,
    ): self {
        $obj = new self;

        $obj['result'] = $result;
        $obj->suggested = $suggested;

        null !== $errors && $obj->errors = $errors;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Indicates whether an address is valid or invalid.
     *
     * @param Result|value-of<Result> $result
     */
    public function withResult(Result|string $result): self
    {
        $obj = clone $this;
        $obj['result'] = $result;

        return $obj;
    }

    /**
     * Provides normalized address when available.
     */
    public function withSuggested(Suggested $suggested): self
    {
        $obj = clone $this;
        $obj->suggested = $suggested;

        return $obj;
    }

    /**
     * @param list<APIError> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj->errors = $errors;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
