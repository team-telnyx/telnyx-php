<?php

declare(strict_types=1);

namespace Telnyx\Addresses\Actions;

use Telnyx\Addresses\Actions\ActionAcceptSuggestionsResponse\Data;
use Telnyx\Addresses\Actions\ActionAcceptSuggestionsResponse\Data\RecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActionAcceptSuggestionsResponseShape = array{data?: Data|null}
 */
final class ActionAcceptSuggestionsResponse implements BaseModel
{
    /** @use SdkModel<ActionAcceptSuggestionsResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null, accepted?: bool|null, recordType?: value-of<RecordType>|null
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   id?: string|null, accepted?: bool|null, recordType?: value-of<RecordType>|null
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
