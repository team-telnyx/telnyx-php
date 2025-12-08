<?php

declare(strict_types=1);

namespace Telnyx\Addresses\Actions\ActionValidateResponse;

use Telnyx\Addresses\Actions\ActionValidateResponse\Data\Result;
use Telnyx\Addresses\Actions\ActionValidateResponse\Data\Suggested;
use Telnyx\APIError;
use Telnyx\APIError\Source;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   result: value-of<Result>,
 *   suggested: Suggested,
 *   errors?: list<APIError>|null,
 *   record_type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Indicates whether an address is valid or invalid.
     *
     * @var value-of<Result> $result
     */
    #[Required(enum: Result::class)]
    public string $result;

    /**
     * Provides normalized address when available.
     */
    #[Required]
    public Suggested $suggested;

    /** @var list<APIError>|null $errors */
    #[Optional(list: APIError::class)]
    public ?array $errors;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

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
     * @param Suggested|array{
     *   administrative_area?: string|null,
     *   country_code?: string|null,
     *   extended_address?: string|null,
     *   locality?: string|null,
     *   postal_code?: string|null,
     *   street_address?: string|null,
     * } $suggested
     * @param list<APIError|array{
     *   code: string,
     *   title: string,
     *   detail?: string|null,
     *   meta?: array<string,mixed>|null,
     *   source?: Source|null,
     * }> $errors
     */
    public static function with(
        Result|string $result,
        Suggested|array $suggested,
        ?array $errors = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        $obj['result'] = $result;
        $obj['suggested'] = $suggested;

        null !== $errors && $obj['errors'] = $errors;
        null !== $record_type && $obj['record_type'] = $record_type;

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
     *
     * @param Suggested|array{
     *   administrative_area?: string|null,
     *   country_code?: string|null,
     *   extended_address?: string|null,
     *   locality?: string|null,
     *   postal_code?: string|null,
     *   street_address?: string|null,
     * } $suggested
     */
    public function withSuggested(Suggested|array $suggested): self
    {
        $obj = clone $this;
        $obj['suggested'] = $suggested;

        return $obj;
    }

    /**
     * @param list<APIError|array{
     *   code: string,
     *   title: string,
     *   detail?: string|null,
     *   meta?: array<string,mixed>|null,
     *   source?: Source|null,
     * }> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj['errors'] = $errors;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
