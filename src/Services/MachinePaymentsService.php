<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MachinePayments\MachinePaymentAccountCreditResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MachinePaymentsContract;

/**
 * Machine payment (MPP) account-credit operations. Fund your Telnyx account programmatically from a machine or agent using the Machine Payment Protocol, an HTTP-402 flow settled via Stripe or Tempo.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MachinePaymentsService implements MachinePaymentsContract
{
    /**
     * @api
     */
    public MachinePaymentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MachinePaymentsRawService($client);
    }

    /**
     * @api
     *
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
     * @param string $amountUsd Amount to credit in USD, as a decimal string with up to two fractional digits (by default between 5.00 and 500.00). The request body is required on the initial challenge request and remains required on a paid retry, where you re-send the identical body plus the payment credential — the credential, not the body, selects the payment, and the retried body is not re-validated.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function accountCredit(
        string $amountUsd,
        RequestOptions|array|null $requestOptions = null
    ): MachinePaymentAccountCreditResponse {
        $params = ['amountUsd' => $amountUsd];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->accountCredit(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
