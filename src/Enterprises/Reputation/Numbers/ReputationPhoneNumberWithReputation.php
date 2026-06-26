<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ReputationPhoneNumberShape from \Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumber
 *
 * @phpstan-type ReputationPhoneNumberWithReputationShape = array{
 *   data: ReputationPhoneNumber|ReputationPhoneNumberShape
 * }
 */
final class ReputationPhoneNumberWithReputation implements BaseModel
{
    /** @use SdkModel<ReputationPhoneNumberWithReputationShape> */
    use SdkModel;

    #[Required]
    public ReputationPhoneNumber $data;

    /**
     * `new ReputationPhoneNumberWithReputation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReputationPhoneNumberWithReputation::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReputationPhoneNumberWithReputation)->withData(...)
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
     * @param ReputationPhoneNumber|ReputationPhoneNumberShape $data
     */
    public static function with(ReputationPhoneNumber|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param ReputationPhoneNumber|ReputationPhoneNumberShape $data
     */
    public function withData(ReputationPhoneNumber|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
