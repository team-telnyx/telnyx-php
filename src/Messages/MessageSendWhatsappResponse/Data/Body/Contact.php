<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappResponse\Data\Body;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Contact\Address;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Contact\Email;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Contact\Org;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Contact\Phone;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Contact\URL;

/**
 * @phpstan-import-type AddressShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Contact\Address
 * @phpstan-import-type EmailShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Contact\Email
 * @phpstan-import-type OrgShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Contact\Org
 * @phpstan-import-type PhoneShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Contact\Phone
 * @phpstan-import-type URLShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Contact\URL
 *
 * @phpstan-type ContactShape = array{
 *   addresses?: list<Address|AddressShape>|null,
 *   birthday?: string|null,
 *   emails?: list<Email|EmailShape>|null,
 *   name?: string|null,
 *   org?: null|Org|OrgShape,
 *   phones?: list<Phone|PhoneShape>|null,
 *   urls?: list<URL|URLShape>|null,
 * }
 */
final class Contact implements BaseModel
{
    /** @use SdkModel<ContactShape> */
    use SdkModel;

    /** @var list<Address>|null $addresses */
    #[Optional(list: Address::class)]
    public ?array $addresses;

    #[Optional]
    public ?string $birthday;

    /** @var list<Email>|null $emails */
    #[Optional(list: Email::class)]
    public ?array $emails;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?Org $org;

    /** @var list<Phone>|null $phones */
    #[Optional(list: Phone::class)]
    public ?array $phones;

    /** @var list<URL>|null $urls */
    #[Optional(list: URL::class)]
    public ?array $urls;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Address|AddressShape>|null $addresses
     * @param list<Email|EmailShape>|null $emails
     * @param Org|OrgShape|null $org
     * @param list<Phone|PhoneShape>|null $phones
     * @param list<URL|URLShape>|null $urls
     */
    public static function with(
        ?array $addresses = null,
        ?string $birthday = null,
        ?array $emails = null,
        ?string $name = null,
        Org|array|null $org = null,
        ?array $phones = null,
        ?array $urls = null,
    ): self {
        $self = new self;

        null !== $addresses && $self['addresses'] = $addresses;
        null !== $birthday && $self['birthday'] = $birthday;
        null !== $emails && $self['emails'] = $emails;
        null !== $name && $self['name'] = $name;
        null !== $org && $self['org'] = $org;
        null !== $phones && $self['phones'] = $phones;
        null !== $urls && $self['urls'] = $urls;

        return $self;
    }

    /**
     * @param list<Address|AddressShape> $addresses
     */
    public function withAddresses(array $addresses): self
    {
        $self = clone $this;
        $self['addresses'] = $addresses;

        return $self;
    }

    public function withBirthday(string $birthday): self
    {
        $self = clone $this;
        $self['birthday'] = $birthday;

        return $self;
    }

    /**
     * @param list<Email|EmailShape> $emails
     */
    public function withEmails(array $emails): self
    {
        $self = clone $this;
        $self['emails'] = $emails;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param Org|OrgShape $org
     */
    public function withOrg(Org|array $org): self
    {
        $self = clone $this;
        $self['org'] = $org;

        return $self;
    }

    /**
     * @param list<Phone|PhoneShape> $phones
     */
    public function withPhones(array $phones): self
    {
        $self = clone $this;
        $self['phones'] = $phones;

        return $self;
    }

    /**
     * @param list<URL|URLShape> $urls
     */
    public function withURLs(array $urls): self
    {
        $self = clone $this;
        $self['urls'] = $urls;

        return $self;
    }
}
