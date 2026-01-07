<?php

declare(strict_types=1);

namespace Telnyx\Addresses\Actions\ActionValidateResponse;

use Telnyx\Addresses\Actions\ActionValidateResponse\Data\Result;
use Telnyx\Addresses\Actions\ActionValidateResponse\Data\Suggested;
use Telnyx\APIError;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SuggestedShape from \Telnyx\Addresses\Actions\ActionValidateResponse\Data\Suggested
 * @phpstan-import-type APIErrorShape from \Telnyx\APIError
 *
 * @phpstan-type DataShape = array{
 *   result: Result|value-of<Result>,
 *   suggested: Suggested|SuggestedShape,
 *   errors?: list<APIError|APIErrorShape>|null,
 *   recordType?: string|null,
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
    #[Optional('record_type')]
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
     * @param Suggested|SuggestedShape $suggested
     * @param list<APIError|APIErrorShape>|null $errors
     */
    public static function with(
        Result|string $result,
        Suggested|array $suggested,
        ?array $errors = null,
        ?string $recordType = null,
    ): self {
        $self = new self;

        $self['result'] = $result;
        $self['suggested'] = $suggested;

        null !== $errors && $self['errors'] = $errors;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Indicates whether an address is valid or invalid.
     *
     * @param Result|value-of<Result> $result
     */
    public function withResult(Result|string $result): self
    {
        $self = clone $this;
        $self['result'] = $result;

        return $self;
    }

    /**
     * Provides normalized address when available.
     *
     * @param Suggested|SuggestedShape $suggested
     */
    public function withSuggested(Suggested|array $suggested): self
    {
        $self = clone $this;
        $self['suggested'] = $suggested;

        return $self;
    }

    /**
     * @param list<APIError|APIErrorShape> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
