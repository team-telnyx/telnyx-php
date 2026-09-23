<?php

declare(strict_types=1);

namespace Telnyx\MachinePayments;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates an account credit using the Machine Payment Protocol (MPP), an HTTP-402 payment flow for machines and agents.
 *
 * The flow has two steps. First, send an authenticated request with the `amount_usd` to credit; the response is `402 Payment Required` with one or more payment challenges (for example separate Tempo and Stripe challenges) in the `WWW-Authenticate` header. Second, retry the request with an `Authorization: Payment ...` credential constructed from the challenge; on success the response includes the credited transaction and a `Payment-Receipt` header.
 *
 * The credited account is never chosen by the request body: the initial request credits the account of the authenticated user, and a paid retry credits the account bound to the verified payment credential. The amount must be within the configured bounds (by default between 5.00 and 500.00 USD).
 *
 * Successful paid retries are idempotent — when Rails reaches its duplicate-transaction lookup for an already-recorded payment, it returns the existing transaction with `created: false` instead of crediting the account again. This deduplication applies to successful fulfillment: re-sending the same Stripe credential may instead be rejected by the upstream provider as an idempotent replay and return `402 Payment Required` rather than the existing transaction.
 *
 * > **Warning: the payment credential is bound to a specific Telnyx account ID.** A payment is captured before the bound account is validated. If the credential names an account that is missing, suspended, blocked, cancelled, dormant, or ineligible for the tier, the payment is captured but **no account is credited**. If the credential names a different but eligible account, that account is credited — the service does not compare it against the payer's account. There is **no automatic refund**: if the captured payment does not credit the intended account, contact Telnyx support for remediation.
 *
 * @see Telnyx\Services\MachinePaymentsService::accountCredit()
 *
 * @phpstan-type MachinePaymentAccountCreditParamsShape = array{amountUsd: string}
 */
final class MachinePaymentAccountCreditParams implements BaseModel
{
    /** @use SdkModel<MachinePaymentAccountCreditParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Amount to credit in USD, as a decimal string with up to two fractional digits (by default between 5.00 and 500.00). The request body is required on the initial challenge request and remains required on a paid retry, where you re-send the identical body plus the payment credential — the credential, not the body, selects the payment, and the retried body is not re-validated.
     */
    #[Required('amount_usd')]
    public string $amountUsd;

    /**
     * `new MachinePaymentAccountCreditParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MachinePaymentAccountCreditParams::with(amountUsd: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MachinePaymentAccountCreditParams)->withAmountUsd(...)
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
     */
    public static function with(string $amountUsd): self
    {
        $self = new self;

        $self['amountUsd'] = $amountUsd;

        return $self;
    }

    /**
     * Amount to credit in USD, as a decimal string with up to two fractional digits (by default between 5.00 and 500.00). The request body is required on the initial challenge request and remains required on a paid retry, where you re-send the identical body plus the payment credential — the credential, not the body, selects the payment, and the retried body is not re-validated.
     */
    public function withAmountUsd(string $amountUsd): self
    {
        $self = clone $this;
        $self['amountUsd'] = $amountUsd;

        return $self;
    }
}
