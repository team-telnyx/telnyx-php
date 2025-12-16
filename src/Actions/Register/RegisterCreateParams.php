<?php

declare(strict_types=1);

namespace Telnyx\Actions\Register;

use Telnyx\Actions\Register\RegisterCreateParams\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Register the SIM cards associated with the provided registration codes to the current user's account.<br/><br/>
 * If <code>sim_card_group_id</code> is provided, the SIM cards will be associated with that group. Otherwise, the default group for the current user will be used.<br/><br/>.
 *
 * @see Telnyx\Services\Actions\RegisterService::create()
 *
 * @phpstan-type RegisterCreateParamsShape = array{
 *   registrationCodes: list<string>,
 *   simCardGroupID?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   tags?: list<string>|null,
 * }
 */
final class RegisterCreateParams implements BaseModel
{
    /** @use SdkModel<RegisterCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $registrationCodes */
    #[Required('registration_codes', list: 'string')]
    public array $registrationCodes;

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    #[Optional('sim_card_group_id')]
    public ?string $simCardGroupID;

    /**
     * Status on which the SIM card will be set after being successful registered.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Searchable tags associated with the SIM card.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * `new RegisterCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RegisterCreateParams::with(registrationCodes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RegisterCreateParams)->withRegistrationCodes(...)
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
     * @param list<string> $registrationCodes
     * @param Status|value-of<Status> $status
     * @param list<string> $tags
     */
    public static function with(
        array $registrationCodes,
        ?string $simCardGroupID = null,
        Status|string|null $status = null,
        ?array $tags = null,
    ): self {
        $self = new self;

        $self['registrationCodes'] = $registrationCodes;

        null !== $simCardGroupID && $self['simCardGroupID'] = $simCardGroupID;
        null !== $status && $self['status'] = $status;
        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    /**
     * @param list<string> $registrationCodes
     */
    public function withRegistrationCodes(array $registrationCodes): self
    {
        $self = clone $this;
        $self['registrationCodes'] = $registrationCodes;

        return $self;
    }

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    public function withSimCardGroupID(string $simCardGroupID): self
    {
        $self = clone $this;
        $self['simCardGroupID'] = $simCardGroupID;

        return $self;
    }

    /**
     * Status on which the SIM card will be set after being successful registered.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Searchable tags associated with the SIM card.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
