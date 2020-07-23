<?php

namespace Telnyx;

abstract class WebhookSignature
{
    /**
     * Verifies the signature header sent by Telnyx. Throws an
     * Exception\SignatureVerificationException exception if the verification fails for
     * any reason.
     *
     * @param string $payload the payload sent by Telnyx
     * @param string $header the contents of the signature header sent by
     *  Telnyx
     * @param string $public_key secret used to generate the signature
     * @param int $tolerance maximum difference allowed between the header's
     *  timestamp and the current time
     *
     * @throws Exception\SignatureVerificationException if the verification fails
     *
     * @return bool
     */
    public static function verifyHeader($payload, $signature_header, $timestamp, $public_key = '', $tolerance = null)
    {
        // Typecast timestamp to int for comparisons
        $timestamp = (int)$timestamp;

        // If it is empty, then maybe we need to get the $public_key from the Telnyx object.
        if (empty($public_key)) {
            $my_public_key = Telnyx::$publicKey;
        }
        else {
            $my_public_key = $public_key;
        }

        // Convert base64 string to bytes for sodium crypto functions
        $public_key_bytes = base64_decode($my_public_key);

        // Check if timestamp is within tolerance
        if (($tolerance > 0) && (\abs(\time() - $timestamp) > $tolerance)) {
            throw Exception\SignatureVerificationException::factory(
                'Timestamp outside the tolerance zone',
                $payload,
                $signature_header
            );
        }

        // Generate the Message Authentication Code
        $mac = \sodium_crypto_auth($payload, $public_key_bytes);

        // Now verify the code against the $mac
        if (!\sodium_crypto_auth_verify($mac, $payload, $public_key_bytes)) {
            throw Exception\SignatureVerificationException::factory(
                'Signature is invalid and does not match the payload',
                $payload,
                $signature_header
            );
        }

        return true;
    }
}
