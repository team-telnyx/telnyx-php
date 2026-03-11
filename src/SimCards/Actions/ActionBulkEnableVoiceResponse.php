<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BulkSimCardActionShape from \Telnyx\SimCards\Actions\BulkSimCardAction
 *
 * @phpstan-type ActionBulkEnableVoiceResponseShape = array{
 *   data?: null|BulkSimCardAction|BulkSimCardActionShape
 * }
 */
final class ActionBulkEnableVoiceResponse implements BaseModel
{
    /** @use SdkModel<ActionBulkEnableVoiceResponseShape> */
    use SdkModel;

    /**
     * This object represents a bulk SIM card action. It groups SIM card actions created through a bulk endpoint under a single resource for further lookup.
     */
    #[Optional]
    public ?BulkSimCardAction $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param BulkSimCardAction|BulkSimCardActionShape|null $data
     */
    public static function with(BulkSimCardAction|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * This object represents a bulk SIM card action. It groups SIM card actions created through a bulk endpoint under a single resource for further lookup.
     *
     * @param BulkSimCardAction|BulkSimCardActionShape $data
     */
    public function withData(BulkSimCardAction|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
