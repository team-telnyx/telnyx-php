<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Contact;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OrgShape = array{
 *   company?: string|null, department?: string|null, title?: string|null
 * }
 */
final class Org implements BaseModel
{
    /** @use SdkModel<OrgShape> */
    use SdkModel;

    #[Optional]
    public ?string $company;

    #[Optional]
    public ?string $department;

    #[Optional]
    public ?string $title;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $company = null,
        ?string $department = null,
        ?string $title = null
    ): self {
        $self = new self;

        null !== $company && $self['company'] = $company;
        null !== $department && $self['department'] = $department;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    public function withCompany(string $company): self
    {
        $self = clone $this;
        $self['company'] = $company;

        return $self;
    }

    public function withDepartment(string $department): self
    {
        $self = clone $this;
        $self['department'] = $department;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
