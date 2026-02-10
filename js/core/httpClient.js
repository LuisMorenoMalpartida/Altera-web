export class HttpClient {
  async getJson(url) {
    const response = await fetch(url, {
      headers: { Accept: 'application/json' },
      cache: 'no-store',
    });

    if (!response.ok) {
      throw new Error(`HTTP ${response.status} al pedir ${url}`);
    }

    return response.json();
  }
}
