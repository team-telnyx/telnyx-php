<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Messages\Actions;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\EmailInboxes\Messages\Actions\InboxActionEmailAddressInput\InboxRecipientAddress;

/**
 * One recipient or a recipient array. Each recipient may be an email string or an object with `email` and optional `name`.
 *
 * @phpstan-import-type InboxRecipientAddressShape from \Telnyx\EmailInboxes\Messages\Actions\InboxActionRecipientInput\InboxRecipientAddress
 * @phpstan-import-type InboxActionEmailAddressInputShape from \Telnyx\EmailInboxes\Messages\Actions\InboxActionEmailAddressInput
 *
 * @phpstan-type InboxActionRecipientInputVariants = string|\Telnyx\EmailInboxes\Messages\Actions\InboxActionRecipientInput\InboxRecipientAddress|list<string|InboxRecipientAddress>
 * @phpstan-type InboxActionRecipientInputShape = InboxActionRecipientInputVariants|InboxRecipientAddressShape|list<InboxActionEmailAddressInputShape>
 */
final class InboxActionRecipientInput implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'string',
            InboxActionRecipientInput\InboxRecipientAddress::class,
            new ListOf(InboxActionEmailAddressInput::class),
        ];
    }
}
