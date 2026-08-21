<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Messages\Actions;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\EmailInboxes\Messages\Actions\InboxActionEmailAddressInput\InboxRecipientAddress;

/**
 * Email address accepted by inbox message actions, as a string or an object with `email` and optional `name`.
 *
 * @phpstan-import-type InboxRecipientAddressShape from \Telnyx\EmailInboxes\Messages\Actions\InboxActionEmailAddressInput\InboxRecipientAddress
 *
 * @phpstan-type InboxActionEmailAddressInputVariants = string|InboxRecipientAddress
 * @phpstan-type InboxActionEmailAddressInputShape = InboxActionEmailAddressInputVariants|InboxRecipientAddressShape
 */
final class InboxActionEmailAddressInput implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', InboxRecipientAddress::class];
    }
}
